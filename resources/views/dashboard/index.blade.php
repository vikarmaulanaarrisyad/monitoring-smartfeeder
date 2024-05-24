@extends('layouts.app')

@section('title', 'Dashboard')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header ui-sortable-handle " style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-fish mr-1"></i>
                        Data Grafik Pakan
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="myChart" style="height: 400px; width: 400px;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Fungsi untuk mengambil data dari server setiap detik
        function fetchData() {
            $.ajax({
                url: '{{ route('api.monitoring.fetchData') }}',
                method: 'GET',
                success: function(response) {
                    updateChart(response); // Panggil fungsi updateChart dengan data yang diambil
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Fungsi untuk memperbarui chart dengan data baru
        function updateChart(data) {
            var salesChartCanvas = document.getElementById('myChart').getContext('2d');
            var salesChartData = {
                labels: data.listTanggal,
                datasets: [{
                    label: 'Presentase Pakan',
                    backgroundColor: 'rgba(52, 231, 43, 0.5)',
                    borderColor: 'rgba(52, 231, 43, 0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(10, 123, 255, 1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(10, 123, 255, 1)',
                    fill: false,
                    lineTension: 0.1,
                    radius: 5,
                    data: data.listSensor
                }]
            };
            var salesChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                animation: {
                    duration: 0
                },
                scales: {
                    x: {
                        ticks: {
                            // Include a dollar sign in the ticks
                            callback: function(value, index, ticks) {
                                return '$' + value;
                            }
                        }
                    }
                }
            };

            // Membuat objek Chart.js
            var salesChart = new Chart(salesChartCanvas, {
                type: 'line',
                showLines: true,
                data: salesChartData,
                options: salesChartOptions
            });
        }

        // Panggil fungsi fetchData setiap detik menggunakan setInterval
        setInterval(fetchData, 1000); // Setiap 1000 milidetik (1 detik)
    </script>
@endpush
