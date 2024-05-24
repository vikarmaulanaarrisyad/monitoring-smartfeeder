@push('scripts_vendor')
    <script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
@endpush

@push('scripts')
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
