<?php

use App\Http\Controllers\{
    DashboardController,
    MonitoringController,
    PenjadwalanPakanController,
    ReportController,
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
// Report
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/data/{tanggal}', [ReportController::class, 'data'])->name('report.data');
// Route::get('/report/pdf/{start}/{end}', [ReportController::class, 'exportPDF'])->name('report.export_pdf');
// Route::get('/report/excel/{start}/{end}', [ReportController::class, 'exportExcel'])->name('report.export_excel');

Route::get('/setting', [SettingController::class, 'index'])
    ->name('setting.index');
Route::put('/setting/{setting}', [SettingController::class, 'update'])
    ->name('setting.update');
