@include('includes.datatable')
@include('includes.datepicker')

@push('scripts')
    <script>
        let table;
        table = $('.report').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            responsive: true,
            language: {
                "processing": "Mohon bersabar..."
            },
            ajax: {
                url: '{{ route('report.data', compact('tanggal')) }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'tanggal',
                },
                {
                    data: 'jam',
                },

                {
                    data: 'presentase_pakan',
                },
            ]
        });
    </script>
@endpush
