<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SensorJarak;
use Illuminate\Http\Request;

class SensorJarakController extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'tanggal'           => date('Y-m-d'),
            'jam'               => date('H:i:s'),
            'jarak'             => $request->jarak,
            'presentase_pakan'  => $request->presentase_pakan,
            'status_pakan'      => $request->status_pakan,
            'status_alarm'      => $request->status_alarm
        ];

        SensorJarak::create($data);

        return 'Berhasil';
    }

    public function bacadata()
    {
        $query = SensorJarak::all();
        return response()->json($query);
    }

    public function deleteAll()
    {
        SensorJarak::truncate();

        return response()->json(['message' => 'Data Berhasil dihapus']);
    }
}
