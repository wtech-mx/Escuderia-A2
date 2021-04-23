    <div class="modal fade" id="proveedores" tabindex="-1" aria-labelledby="proveedoresLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
              <div class="modal-content">

                   <div class="modal-header">
                        <p class="text-center text-dark" style="font: normal normal bold 20px Segoe UI;">Agregar Proveedores</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                        </button>
                   </div>

                   <div class="modal-body">
                      <form method="POST" id="dynamic_form" enctype="multipart/form-data" role="form">
                        @csrf
                          <div class="content container-res">
                             <div class="input-group">
                                 <table class="table table-bordered" id="user_table" style="border: 0px solid #FFFFFF">
                                     <tr>
                                     </tr>
                                 </table>
                             </div>
                          </div>
                        <button class="btn btn-lg btn-success btn-save-neon text-white " name="save" id="save" style="margin-bottom: 5rem!important;">
                               <img class="" src="{{ asset('img/icon/white/save-file-option (1).png') }}" width="20px" >
                               Guardar
                       </button>
                      </form>
                   </div>

              </div>
        </div>
    </div>


<script>
                $(document).ready(function(){
                 var count = 1;
                 dynamic_field(count);
                 function dynamic_field(number)
                 {
                 html = '<tr>';

                  html = '<tr>';
                        html += '<td><label ><strong>Nombre</strong></label></td>';
                        html += '<td><input type="text" placeholder="Nombre" name="nombre[]" class="form-control" /></td>';

                  html += '</tr>';

                  html += '<tr>';
                        html += '<td><label ><strong>Garantia</strong> </label></td>';
                        html += '<td><input type="text" placeholder="Garantia" name="garantia[]" class="form-control" /></td>';
                  html += '</tr>';

                  html += '<tr>';
                        html += '<td><label ><strong>Proveedor</strong> </label></td>';
                        html += '<td><input type="text" placeholder="Proveedor" name="proveedor[]" class="form-control" /></td>';
                  html += '</tr>';

                  html += '<tr>';
                        html += '<td><label ><strong>Costo</strong> </label></td>';
                        html += '<td><input type="number" placeholder="Costo" name="costo[]" class="form-control" /></td>';
                  html += '</tr>';

                  html += '<tr>';
                        html += '<td><label ><strong>Mano de Obra</strong></label></td>';
                        html += '<td><input type="number" placeholder="Mano de Obra" name="mano_o[]" class="form-control" /></td>';
                  html += '</tr>';

                        if(number > 1)
                        {
                            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                            $('tbody').append(html);
                        }
                        else
                        {
                            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button></td></tr>';
                            $('tbody').html(html);
                        }
                 }

                 $(document).on('click', '#add', function(){
                  count++;
                  dynamic_field(count);
                 });

                 $(document).on('click', '.remove', function(){
                  count--;
                  $(this).closest("tbody").remove();
                 });

                 $('#dynamic_form').on('submit', function(event){
                        event.preventDefault();
                        $.ajax({
                            url:'{{ route("store_servicio_proveedor.servicio") }}',
                            method:'post',
                            data:$(this).serialize(),
                            dataType:'json',
                            beforeSend:function(){
                                $('#save').attr('disabled','disabled');
                            },
                            success:function(data)
                            {
                                if(data.error)
                                {
                                    var error_html = '';
                                    for(var count = 0; count < data.error.length; count++)
                                    {
                                        error_html += '<p>'+data.error[count]+'</p>';
                                    }
                                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                                }
                                else
                                {
                                    dynamic_field(1);
                                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');

                                }
                                $('#save').click(function(){
                                    $("#proveedores").modal("hide");
                                });
                            }
                        })
                 });

                });
           </script>
