@extends('layouts.app')

@section('title', 'Monitoring')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Monitoring</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-fish"></i> Pemberian Pakan</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <strong>Beri Pakan</strong>
                        </div>
                        <div class="col-lg-6">
                            <div class="custom-control custom-switch">
                                <input class="custom-control-input" type="checkbox" id="customSwitch1"
                                    onchange="updatePakan(this.checked)" value="{{ $statusPakan->status_pakan }}"
                                    {{ $statusPakan->status_pakan == 1 ? 'checked' : '' }}>
                                <label for="customSwitch1" class="custom-control-label"><span
                                        id="statusPakan">OFF</span></label>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <strong>Terakhir Kali Pemberian Pakan : </strong>
                    <p class="text-muted">
                        {{ tanggal_indonesia($statusPakan->updated_at, true) }},
                        {{ $statusPakan->updated_at->format('H:i:s') }}
                    </p>
                    <hr>
                </div>
            </div>
            {{--  <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-fish"></i> Ikan</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <strong>Jenis Ikan : </strong>
                            <p class="text-muted">
                                Ikan Hias
                            </p>
                        </div>
                    </div>

                </div>
            </div>  --}}
        </div>

       
    </div>
@endsection
@include('monitoring.scripts')
