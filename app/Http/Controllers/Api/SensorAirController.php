<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SensorAir;
use Illuminate\Http\Request;

class SensorAirController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'tanggal'           => date('Y-m-d'),
            'jam'               => date('H:i:s'),
            'value'             => $request->ph,
        ];

        SensorAir::create($data);

        return 'Berhasil';
    }


    public function bacadata()
    {
        $query = SensorAir::all();
        return response()->json($query);
    }

    public function deleteAll()
    {
        SensorAir::truncate();

        return response()->json(['message' => 'Data Berhasil dihapus']);
    }
}
