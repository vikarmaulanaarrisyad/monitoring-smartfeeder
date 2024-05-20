<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\SensorJarak;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statusPakan = Monitoring::first();
        $sensorJarak = SensorJarak::latest()->limit(5)->get();

        $listTanggal = [];
        $listSensor = [];
        foreach ($sensorJarak as $jarak) {
            $listTanggal[] = $jarak->tanggal;
            $listSensor[] = $jarak->presentase_pakan;
        }

        return view('monitoring.index', compact('statusPakan', 'listSensor', 'listTanggal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //cek status_pakan
        $cekStatusPakan = Monitoring::first();

        if ($cekStatusPakan->status_pakan == 0) {
            $statusPakan = 1;
        } else {
            $statusPakan = 0;
        }

        Monitoring::updateOrCreate(['id' => 1], ['status_pakan' => $statusPakan]);

        return response()->json(['message' => 'Pemberian pakan berhasil']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoring $monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitoring $monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoring $monitoring)
    {
        //
    }
}
