<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalRolling;
use DB;

class UangMakanController extends Controller
{
    //
    public static function view(){
        // $jadwal = JadwalRolling::distinct()
        //         ->select('NoIdentitas', 'Tanggal', 'IdTipe', 'WaktuMulai', 'WaktuSelesai', DB::raw('TIMESTAMPDIFF(MINUTE, WaktuMulai, WaktuSelesai)/60 as durasi'))
        //         ->get();
        $result = DB::select('
                    SELECT
                    users.Nama, Tanggal, SUM(durasi) as durasi, 
                        CASE 
                            WHEN Hari IN("Senin", "Selasa", "Rabu", "Kamis", "Jumat") AND SUM(durasi) >= 5 THEN 15000
                            WHEN Hari IN("Sabtu") AND SUM(durasi) >= 4 THEN 15000
                            ELSE 0
                        END as uang_makan
                    FROM
                        (SELECT DISTINCT NoIdentitas, Tanggal, Hari, IdTipe, TIMESTAMPDIFF(MINUTE, WaktuMulai, WaktuSelesai)/60 as durasi
                        FROM jadwal_rolling) jadwal
                        JOIN users ON jadwal.NoIdentitas = users.NoIdentitas
                    GROUP BY users.Nama, Tanggal, Hari
                ');
        return view('uang_makan')->with([
            'result' => $result,
        ]);
    }
}
