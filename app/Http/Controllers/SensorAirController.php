<?php

namespace App\Http\Controllers;

use App\Models\SensorAir;
use Illuminate\Http\Request;

class SensorAirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sensorair.index');
    }

    public function data()
    {
        $query = SensorAir::orderBy('id', 'DESC');
        return datatables($query)
            ->addIndexColumn()
            ->editColumn('tanggal', function ($query) {
                return tanggal_indonesia($query->tanggal);
            })
            ->addColumn('aksi', function ($query) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('sensorair.show', $query->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('sensorair.destroy', $query->id) . '`,`' . $query->tanggal . '`)"><i class="fas fa-trash"></i></button>
                ';
            })
            ->escapeColumns([])
            ->make(true);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SensorAir $sensorAir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SensorAir $sensorAir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SensorAir $sensorAir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SensorAir $sensorAir)
    {
        //
    }
}
