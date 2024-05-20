@extends('layouts.app')

@section('title', 'Data Sensor')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Sensor</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <x-card>
                {{--  <x-slot name="header">
                    <button class="btn btn-sm btn-danger" onclick="deleteData(`{{ route('api.sensorjarak.delete_all') }}`)"><i
                            class="fas fa-trash"></i> Hapus
                        Data</button>
                </x-slot>  --}}

                <div class="row">
                    <div class="col-12">
                        <h5 class="text-center">Pemberian Pakan pada <span
                                class="text-bold">{{ tanggal_indonesia($tanggal, true) }}</span>
                        </h5>
                    </div>
                </div>

                <x-table class="report">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Presentase Pakan</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
@include('report.scripts')
