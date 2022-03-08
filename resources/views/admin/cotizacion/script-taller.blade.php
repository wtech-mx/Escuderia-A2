<script>
$('#agregar').click(function(){
    agregar();
});

function agregar(){
    var vendedor=$('#vendedor').val();
    var refaccion=$('#refaccion').val();
    var cantidad=$('#cantidad').val();
    var id_co=$('#id_co').val();
    var fila='<tr>'+
    '<td><input type="text" class="form-control" placeholder="Refaccion" id="refaccion[]" name="refaccion[]"></td>'+
    '<td><input type="text" class="form-control" placeholder="Proveedor" id="vendedor[]" name="vendedor[]"></td>'+
    '<td><input type="text" class="form-control" placeholder="Marca" id="mano_obra[]" name="mano_obra[]"></td>'+
    '<td><input type="number" class="form-control" placeholder="Importe U." id="importe_unitario[]" name="importe_unitario[]"></td>'+
    '<td><input type="number" class="form-control" placeholder="Importe T." id="importe_total[]" name="importe_total[]"></td>'+
    '<td style="display: none"><input type="text" class="form-control" value="'+ id_co  +'" id="id_cotizacion[]" disable name="id_cotizacion[]"></td>'+
    '</tr>';

    $('#tabla').append(fila);
}

// Vendedor
$(function() {
    $('.toggle-class').change(function() {
        var vendedor = $(this).val();
        var refaccion = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('up.cotizacion') }}',
            data: {
                'vendedor': vendedor,
                'refaccion': refaccion,
                'id': id
            },
            success: function(data) {
                console.log(vendedor)
                console.log(data.success)
            }
        });
    })
})

// refaccion
$(function() {
    $('.refaccion').change(function() {
        var refaccion = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('refaccion.cotizacion') }}',
            data: {
                'refaccion': refaccion,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

// mano_obra
$(function() {
    $('.mano_obra').change(function() {
        var mano_obra = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('mano_obra.cotizacion') }}',
            data: {
                'mano_obra': mano_obra,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

// importe_unitario
$(function() {
    $('.importe_unitario').change(function() {
        var importe_unitario = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('importe_unitario.cotizacion') }}',
            data: {
                'importe_unitario': importe_unitario,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

// importe_total
$(function() {
    $('.importe_total').change(function() {
        var importe_total = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('importe_total.cotizacion') }}',
            data: {
                'importe_total': importe_total,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

// Vendedor
$(function() {
    $('.toggle-class').change(function() {
        var vendedor = $(this).val();
        var refaccion = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('up.cotizacion') }}',
            data: {
                'vendedor': vendedor,
                'refaccion': refaccion,
                'id': id
            },
            success: function(data) {
                console.log(vendedor)
                console.log(data.success)
            }
        });
    })
})

// refaccion
$(function() {
    $('.refaccion').change(function() {
        var refaccion = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('refaccion.cotizacion') }}',
            data: {
                'refaccion': refaccion,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

// mano_obra
$(function() {
    $('.mano_obra').change(function() {
        var mano_obra = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('mano_obra.cotizacion') }}',
            data: {
                'mano_obra': mano_obra,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

// importe_unitario
$(function() {
    $('.importe_unitario').change(function() {
        var importe_unitario = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('importe_unitario.cotizacion') }}',
            data: {
                'importe_unitario': importe_unitario,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

// importe_total
$(function() {
    $('.importe_total').change(function() {
        var importe_total = $(this).val();
        var id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('importe_total.cotizacion') }}',
            data: {
                'importe_total': importe_total,
                'id': id
            },
            success: function(data) {
                console.log(refaccion)
                console.log(data.success)
            }
        });
    })
})

</script>
