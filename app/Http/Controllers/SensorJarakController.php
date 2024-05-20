<?php

namespace App\Http\Controllers;

use App\Models\SensorJarak;
use Illuminate\Http\Request;

class SensorJarakController extends Controller
{

    public function data()
    {
        $query = SensorJarak::orderBy('id', 'DESC');
        return datatables($query)
            ->addIndexColumn()
            ->editColumn('tanggal', function ($query) {
                return tanggal_indonesia($query->tanggal);
            })
            ->editColumn('presentase_pakan', function ($query) {
                return $query->presentase_pakan . ' %';
            })
            ->editColumn('status_pakan', function ($query) {
                if ($query->status_pakan == 0) {
                    return '
                        <span class="badge badge-danger">OFF</span>
                    ';
                }
                return '
                <span class="badge badge-success">ON</span>
                ';
            })
            ->editColumn('status_alarm', function ($query) {
                if ($query->status_pakan == 0) {
                    return '
                        <span class="badge badge-danger">OFF</span>
                    ';
                }
                return '
                <span class="badge badge-success">ON</span>
                ';
            })
            ->addColumn('aksi', function ($query) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('jarak.show', $query->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('jarak.destroy', $query->id) . '`,`' . $query->tanggal . '`)"><i class="fas fa-trash"></i></button>
                ';
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sensorjarak.index');
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
    public function show(SensorJarak $sensorJarak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SensorJarak $sensorJarak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SensorJarak $sensorJarak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SensorJarak $sensorJarak)
    {
        //
    }
}
