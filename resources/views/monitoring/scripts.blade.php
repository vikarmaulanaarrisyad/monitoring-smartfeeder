@push('scripts_vendor')
    <script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
@endpush

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

    <script>
        function updatePakan(checked) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            })
            swalWithBootstrapButtons.fire({
                title: 'Apakah anda yakin?',
                text: 'Anda akan mengaktifkan pemberian pakan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Iya lanjutkan !',
                cancelButtonText: 'Batalkan',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#statusPakan').text('ON');
                    const value = 1;
                    $.ajax({
                        type: "POST",
                        url: "{{ route('monitoring.store') }}",
                        data: {
                            value: value,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status = 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(() => {
                                    window.location.reload();
                                })
                            }
                        },
                        error: function(xhr, status, error) {
                            // Menampilkan pesan error
                            Swal.fire({
                                icon: 'error',
                                title: 'Opps! Gagal',
                                text: xhr.responseJSON.message,
                                showConfirmButton: true,
                            }).then(() => {
                                // Refresh tabel atau lakukan operasi lain yang diperlukan
                                //table.ajax.reload();
                            });
                        }
                    });
                } else {
                    $('#statusPakan').text('OFF');
                    const value = 0;
                    $('#customSwitch1').prop('checked', false);
                }
            });

        }
    </script>
@endpush
