<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Biodata;
use App\Models\JadwalRolling;
use App\Models\Absensi;
use App\Models\Invoice;
use App\Models\RincianInvoice;
use DB;

class InvoiceController extends Controller
{
    //
    public static function input_view(Request $request){
        $biodatas = Biodata::has('jadwal_rolling')
                            ->doesntHaveInvoice(now()->month, now()->year)
                            ->get();
        $jadwal_hadir = JadwalRolling::where('IdAnak', $request->IdAnak)
                                        ->whereYear('Tanggal', now()->year)
                                        ->whereMonth('Tanggal', now()->month)
                                        ->groupBy('IdTipe')
                                        ->select('IdTipe', DB::raw('count(*) as JumlahPertemuan'), DB::raw('GROUP_CONCAT(Hari SEPARATOR \', \') as ListHari'))
                                        ->get();
        $jadwal_tidak_hadir = JadwalRolling::where('IdAnak', $request->IdAnak)
                                        ->whereYear('Tanggal', now()->year)
                                        ->whereMonth('Tanggal', now()->month)
                                        ->hasAbsensi(0)
                                        ->groupBy('IdTipe')
                                        ->select('IdTipe', DB::raw('count(*) as JumlahPertemuan'), DB::raw('GROUP_CONCAT(Hari SEPARATOR \', \') as ListHari'))
                                        ->get();
        $first_jadwal = JadwalRolling::where('IdAnak', $request->IdAnak)
                                    ->whereYear('Tanggal', now()->year)
                                    ->whereMonth('Tanggal', now()->month)
                                    ->first();
        if($first_jadwal){
            $first_jadwal = $first_jadwal->NoIdentitas;
        }
        $today = Carbon::now()->format('d-m-Y');
        return view('invoice_input')->with([
            'biodatas' => $biodatas,
            'first_jadwal' => $first_jadwal,
            'jadwal_hadir' => $jadwal_hadir,
            'jadwal_tidak_hadir' => $jadwal_tidak_hadir,
            'today' => $today,
        ]);
    }

    public static function insert(Request $request){
        if(!$request->NoIdentitas){
            return redirect('input_invoice')
                        ->withErrors(['message' => 'Pilih Anak dahulu']);
        }
        $invoice = new Invoice;

        $invoice->NoIdentitas = $request->NoIdentitas;
        $invoice->IdAnak = $request->IdAnak;
        $date = Carbon::now();
        $invoice->TglInvoice = $date;
        $invoice->Bulan = $date->month;
        $invoice->Tahun = $date->year;
        $invoice->SubTotal = $request->SubTotal;
        $invoice->GrandTotal = $request->GrandTotal;
        $invoice->StatusPelunasan = 0;
        $invoice->save();

        for( $i=0; $i < count($request->absensi_IdTipe) ; $i++){
            $rincian = new RincianInvoice;
            $rincian->NoInvoice = $invoice->NoInvoice;
            $rincian->JenisTransaksi = 1;
            $rincian->IdTipe = $request->absensi_IdTipe[$i];
            $rincian->Hari = $request->absensi_Hari[$i];
            $rincian->JmlhPertemuan = $request->absensi_JmlhPertemuan[$i];
            $rincian->Harga = $request->absensi_Harga[$i];
            $rincian->Total = $request->absensi_Total[$i];
            $rincian->save();
        }
        for( $i=0; $i < count($request->pengembalian_IdTipe) ; $i++){
            $rincian = new RincianInvoice;
            $rincian->NoInvoice = $invoice->NoInvoice;
            $rincian->JenisTransaksi = 0;
            $rincian->IdTipe = $request->pengembalian_IdTipe[$i];
            $rincian->Hari = $request->pengembalian_Hari[$i];
            $rincian->JmlhPertemuan = $request->pengembalian_JmlhPertemuan[$i];
            $rincian->Harga = $request->pengembalian_Harga[$i];
            $rincian->Total = $request->pengembalian_Total[$i];
            $rincian->save();
        }
        return redirect('invoice_archive');
    }

    public static function view(){
        $invoices = Invoice::all();
        return view('invoice_archive')->with([
            'invoices' => $invoices,
        ]);
    }

    public static function view_detail($NoInvoice){
        $invoice = Invoice::find($NoInvoice);
        return view('invoice_detail')->with([
            'invoice' => $invoice,
        ]);
    }
}
