@extends('layouts.app')

@section('title', 'Data Penjadwalan Pakan')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Penjadwalan Pakan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <x-card>
                <x-slot name="header">
                    <button onclick="addData(`{{ route('penjadwalan.store') }}`)" class="btn btn-success btn-sm"><i
                            class="fas fa-plus-circle"></i> Tambah
                        Jadwal</button>
                </x-slot>

                <x-table class="penjadwalanpakan">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Waktu Mulai</th>
                        <th>Aksi</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
    @include('penjadwalanpakan.form')
@endsection
@include('penjadwalanpakan.scripts')
