<?php

use App\Http\Controllers\Api\MonitoringController;
use App\Http\Controllers\Api\PenjadwalanPakanController;
use App\Http\Controllers\Api\SensorJarakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/v1/monitoring/bacaStatusPakan', [MonitoringController::class, 'bacaStatusPakan'])->name('api.monitoring.bacaStatusPakan');
Route::get('/v1/monitoring/ubahstatus', [MonitoringController::class, 'ubahstatus'])->name('api.monitoring.ubahstatus');
Route::get('/v1/monitoring/fetch-data', [MonitoringController::class, 'fetchData'])->name('api.monitoring.fetchData');
Route::apiResource('/v1/monitoring', MonitoringController::class);

Route::get('/v1/penjadwalanpakan/getJadwalPakan', [PenjadwalanPakanController::class, 'getJadwalPakan'])->name('api.penjadwalanpakan.jadwalpakan');
Route::get('/v1/penjadwalanpakan/bacadata', [PenjadwalanPakanController::class, 'bacadata'])->name('api.penjadwalanpakan.bacadata');
Route::get('/v1/penjadwalanpakan/ubahstatus', [PenjadwalanPakanController::class, 'ubahstatus'])->name('api.penjadwalanpakan.ubahstatus');
Route::apiResource('/v1/penjadwalanpakan', PenjadwalanPakanController::class);

Route::get('/v1/sensorjarak/bacadata', [SensorJarakController::class, 'bacadata'])->name('api.sensorjarak.bacadata');
Route::get('/v1/sensorjarak/delete_all', [SensorJarakController::class, 'deleteAll'])->name('api.sensorjarak.delete_all');
Route::apiResource('/v1/sensorjarak', SensorJarakController::class);
