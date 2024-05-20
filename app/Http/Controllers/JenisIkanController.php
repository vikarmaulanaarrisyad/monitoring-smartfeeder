<?php

namespace App\Http\Controllers;

use App\Models\JenisIkan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisIkanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenisikan.index');
    }

    public function data()
    {
        $query = JenisIkan::all();
        return datatables($query)
            ->addIndexColumn()
            ->addColumn('aksi', function ($query) {
                return '
                <button class="btn btn-sm btn-primary" onclick="editData(`' . route('jenisikan.show', $query->id) . '`)"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(`' . route('jenisikan.destroy', $query->id) . '`,`' . $query->waktu_mulai . '`)"><i class="fas fa-trash"></i></button>
                ';
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'jumlah' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Maaf data yang anda masukan salah, silahkan coba kembali'], 422);
        }

        $data = [
            'name' => $request->name,
            'jumlah' => $request->jumlah
        ];

        JenisIkan::create($data);

        return response()->json(['message' => 'Data berhasil ditambahkan'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = JenisIkan::find($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisIkan $jenisIkan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenisIkan = JenisIkan::find($id);

        $rules = [
            'name' => 'required',
            'jumlah' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Maaf data yang anda masukan salah, silahkan coba kembali'], 422);
        }

        $data = [
            'name' => $request->name,
            'jumlah' => $request->jumlah
        ];

        $jenisIkan->update($data);

        return response()->json(['message' => 'Data berhasil diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = JenisIkan::find($id);

        $data->delete();
    }
}
