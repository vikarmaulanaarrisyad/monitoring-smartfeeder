@extends('layouts.app')

@section('title', 'Data Jenis Ikan')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Jenis Ikan</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <x-card>
                <x-slot name="header">
                    <button onclick="addData(`{{ route('jenisikan.store') }}`)" class="btn btn-success btn-sm"><i
                            class="fas fa-plus-circle"></i> Tambah
                        Jenis Ikan</button>
                </x-slot>

                <x-table class="jenisikan">
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Jenis Ikan</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
    @include('jenisikan.form')
@endsection
@include('jenisikan.scripts')
