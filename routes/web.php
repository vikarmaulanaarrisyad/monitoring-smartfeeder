<?php

use App\Http\Controllers\{
    DashboardController,
    JenisIkanController,
    MonitoringController,
    PenjadwalanPakanController,
    ReportController,
    SensorAirController,
    SensorJarakController,
    SettingController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Monitoring
Route::resource('/monitoring', MonitoringController::class);
// Penjadwalan Pakan
Route::get('/penjadwalan/data', [PenjadwalanPakanController::class, 'data'])->name('penjadwalan.data');
Route::resource('/penjadwalan', PenjadwalanPakanController::class);
// Sensor Jarak
Route::get('/jarak/data', [SensorJarakController::class, 'data'])->name('jarak.data');
Route::resource('/jarak', SensorJarakController::class);

// Sensor PH Air
Route::get('/sensorair/data', [SensorAirController::class, 'data'])->name('sensorair.data');
Route::resource('/sensorair', SensorAirController::class);

// Report
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/data/{tanggal}', [ReportController::class, 'data'])->name('report.data');

Route::get('/jenisikan/data', [JenisIkanController::class, 'data'])->name('jenisikan.data');
Route::resource('jenisikan', JenisIkanController::class);


Route::get('/setting', [SettingController::class, 'index'])
    ->name('setting.index');
Route::put('/setting/{setting}', [SettingController::class, 'update'])
    ->name('setting.update');
