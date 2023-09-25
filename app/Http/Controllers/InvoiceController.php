<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Biodata;
use App\Models\Absensi;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    //
    public static function input_view(){
        $biodatas = Biodata::has('absensies')->get();
        $absensies = Absensi::where('IdAnak', 1)->get();
        $today = Carbon::now()->format('d-m-Y');
        return view('invoice_input')->with([
            'biodatas' => $biodatas,
            'absensies' => $absensies,
            'today' => $today,
        ]);
    }

    public static function input_view_selected($request){
        return redirect('input_invoice/'.$request->IdAnak);
    }

    public static function input_view_form($IdAnak){
        $biodata = Biodata::where('IdAnak', $IdAnak)->first();
        $absensies = Absensi::where('IdAnak', $IdAnak)->get();
        $today = Carbon::now()->format('d-m-Y');
        return view('invoice_input_form')->with([
            'biodata' => $biodata,
            'absensies' => $absensies,
            'today' => $today,
        ]);
    }

    public static function insert(Request $request){
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

        return redirect('invoice_archive');
    }

    public static function view(){
        $invoices = Invoice::all();
        return view('invoice_archive')->with([
            'invoices' => $invoices,
        ]);
    }
}
