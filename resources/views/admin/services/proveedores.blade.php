
<script>
    var agregar = document.getElementById('proveedor');
    var contenedor = document.getElementById('nuevo-form');
    var contador = 0;

    agregar.addEventListener('click', function(){
        contador++;
        var _form = '<hr><label class="subtitle-form-servi">Proveedor '+ contador +'</label>' +
                    '<div class="row"><div class="col-6">' +
                    '<label class="text-white">Pieza o Refacción</label>' +
                    '<input type="text" class="form-control" name="nombre[]" placeholder="pieza / Refacción"></div>' +
                    '<div class="col-6">' +
                    '<label class="text-white">Marca</label>' +
                    '<input type="text" class="form-control" name="marca[]" placeholder="Marca"></div></div>' +
                    '<div class="row"><div class="col-6">' +
                    '<label class="text-white">Garantia</label>' +
                    '<input type="text" class="form-control" name="garantia[]" placeholder="Garantia"></div>' +
                    '<div class="col-6">' +
                    '<label class="text-white">Cantidad</label>' +
                    '<input type="number" class="form-control" name="cantidad[]" placeholder="Cantidad"></div></div>' +
                    '<div class="row"><div class="col-6">' +
                    '<label class="text-white">Costo Unitario</label>' +
                    '<input type="number" class="form-control" name="costo[]" placeholder="Costo Unitario"></div>' +
                    '<div class="col-6">' +
                    '<label class="text-white">Costo Total</label>' +
                    '<input type="number" class="form-control" name="costo_total[]" placeholder="Costo total"></div></div>' +
                    '<div class="row"><div class="col-6">' +
                    '<label class="text-white">Proveedor</label>' +
                    '<input type="text" class="form-control" name="proveedor[]" placeholder="Proveedor"></div>' +
                    '<div class="col-6">' +
                    '<label class="text-white">Mano de Obra</label>' +
                    '<input type="number" class="form-control" name="mano_o[]" placeholder="Mano de Obra"></div></div>';

        contenedor.innerHTML += _form;
    })

    //remove fields group
    // $("body").on("click",".remove",function(){
    //     $(this).parents("._form").remove();
    // });
</script>
