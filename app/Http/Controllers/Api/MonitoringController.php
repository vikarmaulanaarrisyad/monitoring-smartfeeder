<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Monitoring;
use App\Models\SensorJarak;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $statusPakan = Monitoring::first();
        return $statusPakan->status_pakan;
    }

    public function bacaStatusPakan()
    {
        $statusPakan = Monitoring::first();
        return $statusPakan->status_pakan;
    }

    public function ubahStatus(Request $request)
    {
        $monitoring = Monitoring::where('status_pakan', 1)->first();
        $monitoring->update([
            'status_pakan' => 0,
        ]);

        return 'Berhasil';
    }

    public function fetchData()
    {
        // Ambil data dari database (misalnya menggunakan Eloquent)
        $chartData = SensorJarak::latest()->limit(5)->get(); // Ganti ini dengan query yang sesuai untuk data Anda

        // Format data sesuai dengan yang diharapkan oleh Chart.js
        $listTanggal = $chartData->pluck('tanggal')->toArray();
        $listSensor = $chartData->pluck('presentase_pakan')->toArray();

        // Return data dalam format JSON
        return response()->json([
            'listTanggal' => $listTanggal,
            'listSensor' => $listSensor,
        ]);
    }
}
