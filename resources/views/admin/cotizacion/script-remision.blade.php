<script type="text/javascript">
    $('#agregar').click(function(){
        agregar();
    });

    function agregar(){
        var reparacion=$('#reparacion').val();
        var mano=$('#mano').val();
        var importe=$('#importe').val();
        var id_co=$('#id_co').val();
        var fila='<tr>'+
        '<td><input style="color: #fff; background-color: #00000000" type="text" class="form-control" placeholder="Reparacion" id="reparacion[]" name="reparacion[]"></td>'+
        '<td><input style="color: #fff; background-color: #00000000" type="number" class="form-control" placeholder="Mano O." id="mano[]" name="mano[]"></td>'+
        '<td><input style="color: #fff; background-color: #00000000" type="number" class="form-control" placeholder="Importe" id="importe[]" name="importe[]"></td>'+
        '<td style="display: none"><input type="text" class="form-control" value="'+ id_co  +'" id="id_cotizacion[]" disable name="id_cotizacion[]"></td>'+
        '</tr>';

        $('#tabla').append(fila);
    }

    $(function() {
        $('.toggle-class').change(function() {
            var aprobacion = $(this).prop('checked') == true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('ChangeUserEstatus.remision') }}',
                data: {
                    'aprobacion': aprobacion,
                    'id': id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    })

    // reparacion
    $(function() {
        $('.reparacion').change(function() {
            var reparacion = $(this).val();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('reparacion.remision') }}',
                data: {
                    'reparacion': reparacion,
                    'id': id
                },
                success: function(data) {
                    console.log(reparacion)
                    console.log(data.success)
                }
            });
        })
    })

    // mano
    $(function() {
        $('.mano').change(function() {
            var mano = $(this).val();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('mano.remision') }}',
                data: {
                    'mano': mano,
                    'id': id
                },
                success: function(data) {
                    console.log(mano)
                    console.log(data.success)
                }
            });
        })
    })

    // importe
    $(function() {
        $('.importe').change(function() {
            var importe = $(this).val();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('importe.remision') }}',
                data: {
                    'importe': importe,
                    'id': id
                },
                success: function(data) {
                    console.log(importe)
                    console.log(data.success)
                }
            });
        })
    })

    // fecha_cotizacion
    $(function() {
        $('.fecha_cotizacion').change(function() {
            var fecha_cotizacion = $(this).val();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('fecha_cotizacion.remision') }}',
                data: {
                    'fecha_cotizacion': fecha_cotizacion,
                    'id': id
                },
                success: function(data) {
                    console.log(fecha_cotizacion)
                    console.log(data.success)
                }
            });
        })
    })

    // total_cotizacion
    $(function() {
        $('.total_cotizacion').change(function() {
            var total_cotizacion = $(this).val();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('total_cotizacion.remision') }}',
                data: {
                    'total_cotizacion': total_cotizacion,
                    'id': id
                },
                success: function(data) {
                    console.log(total_cotizacion)
                    console.log(data.success)
                }
            });
        })
    })

    </script>
