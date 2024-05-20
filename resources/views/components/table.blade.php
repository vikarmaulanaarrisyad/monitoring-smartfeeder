<table {{ $attributes->merge(['class' => 'table table-striped mt-3']) }}>
    @isset($thead)
        <thead class="bg-success">
            {{ $thead }}
        </thead>
    @endisset

    <tbody>
        {{ $slot }}
    </tbody>

    @isset($tfoot)
        <tfoot>
            {{ $tfoot }}
        </tfoot>
    @endisset
</table>
