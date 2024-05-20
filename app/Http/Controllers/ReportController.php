<?php

namespace App\Http\Controllers;

use App\Models\SensorJarak;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = date('Y-m-d');

        return view('report.index', compact('tanggal'));
    }

    public function getData($tanggal)
    {
        $data = [];
        $i = 1;

        $sensors = SensorJarak::where('tanggal', $tanggal)->orderBy('id', 'DESC')->get();

        foreach ($sensors as $jarak) {
            $row = [];
            $row['DT_RowIndex'] = $i++;
            $row['tanggal'] = tanggal_indonesia($tanggal);
            $row['jam'] = $jarak->jam;
            $row['presentase_pakan'] = $jarak->presentase_pakan . " %";

            array_push($data, $row);
        }

        return $data;
    }

    public function data($tanggal)
    {
        $data = $this->getData($tanggal);

        return datatables($data)
            ->escapeColumns([])
            ->make(true);
    }
}
