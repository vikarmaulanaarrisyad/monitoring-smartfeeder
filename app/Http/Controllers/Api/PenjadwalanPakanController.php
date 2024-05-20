<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenjadwalanPakan;
use Illuminate\Http\Request;

class PenjadwalanPakanController extends Controller
{
    public function index()
    {
        $penjadwalan = PenjadwalanPakan::all();

        return $penjadwalan;
    }

    public function getJadwalPakan(Request $request)
    {
        // Mengambil waktu saat ini
        $jamSekarang = Date('H:i:s');

        $penjadwalan = PenjadwalanPakan::where('waktu_mulai', '=', $jamSekarang)->get();
        foreach ($penjadwalan as $jadwal) {
            if ($jadwal->waktu_mulai == $jamSekarang) {
                $jadwal->update([
                    'status_pakan' => 1,
                ]);
            }
        }

        return response()->json($penjadwalan);
    }

    public function bacaData()
    {
        $penjadwalan = PenjadwalanPakan::where('status_pakan', 1)->first();

        if ($penjadwalan->status_pakan > 0) {
            return 1;
        }
    }

    public function ubahStatus(Request $request)
    {
        $penjadwalan = PenjadwalanPakan::where('status_pakan', 1)->first();
        $penjadwalan->update([
            'status_pakan' => 0,
        ]);

        return 'Berhasil';
    }
}
