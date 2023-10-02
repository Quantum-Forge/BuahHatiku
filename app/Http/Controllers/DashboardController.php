<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalRolling;
use App\Models\Absensi;
use App\Models\Biodata;
use App\Models\User;
use DB;

class DashboardController extends Controller
{
    //
    public static function view(){
        $user = Auth::user();
        $dashboard = DB::select('
            SELECT
                MONTHNAME(Tanggal) as month,
                COUNT(CASE WHEN Hadir = 1 THEN IdAbsensi END) as hadir,
                COUNT(CASE WHEN Hadir = 0 THEN IdAbsensi END) as tidak_hadir
            FROM jadwal_rolling
                JOIN absensi ON jadwal_rolling.IdJadwal = absensi.IdJadwal
            GROUP BY 1
        ');
        $jadwals = JadwalRolling::orderBy('Tanggal')->orderBy('WaktuMulai')->take(4)->get();
        $biodatas = Biodata::orderBy('created_at')->take(4)->get();
        $jumlah_terapis = User::where('Role', 3)->count();
        $hadir = Absensi::where('Hadir', 1)->count();
        $tidak_hadir = Absensi::where('Hadir', 0)->count();
        return view('dashboard')->with([
            'user' => $user,
            'dashboard' => $dashboard,
            'jadwals' => $jadwals,
            'biodatas' => $biodatas,
            'jumlah_terapis' => $jumlah_terapis,
            'hadir' => $hadir,
            'tidak_hadir' => $tidak_hadir,
        ]);
    }
}
