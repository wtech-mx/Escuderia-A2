@if (Session::has('success'))
<script>
    Swal.fire({
        title: 'Exito!!',
        html: 'Se ha Creado, ' +
            'Exitosamente',
        // text: 'Se ha agragado la "MARCA" Exitosamente',
        imageUrl: '{{ asset('img/icon/color/comprobado_2.png') }}',
        background: '#fff',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'USUARIO IMG',
    });

</script>
@endif

@if (Session::has('store'))
<script>
    Swal.fire({
        title: 'Exito!!',
        html: 'Se ha agragado la <b>Nota</b>, ' +
            'Exitosamente',
        // text: 'Se ha agragado la "MARCA" Exitosamente',
        imageUrl: '{{ asset('img/icon/color/post-it.png') }}',
        background: '#fff',
        imageWidth: 150,
        imageHeight: 150,
        imageAlt: 'Nota IMG',
    })
</script>
@endif
