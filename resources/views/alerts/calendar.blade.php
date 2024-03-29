@section('scripts')

<link href='{{ asset('lib/main.css') }}' rel='stylesheet' />

<script src='{{ asset('lib/main.js') }}'></script>

    @php
    $Y = date('Y') ;
    $M = date('m');
    $D = date('d') ;
    $Fecha = $Y."-".$M."-".$D;
   @endphp



<script>
      document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

            height: 'auto',
            initialDate: '{{$Fecha}}',
            initialView: 'dayGridMonth',
            navLinks: false,
            editable: true,
            dayMaxEvents: 3,

            headerToolbar:{
              left:'prev,next today',
              center:'title',
              right: 'listMonth,dayGridMonth'
            },

          views: {
            dayGridMonth: {
                buttonText: 'MES'
            },
            listMonth: {
                buttonText: 'LISTA'
            }
          },

            dateClick:function (info) {

              limpiarFormulario();
              $('#txtFecha').val(info.dateStr);
              $("#btnAgregar").prop("disabled",false);
              $("#btnModificar").prop("disabled",true);
              $("#btnBorrar").prop("disabled",true);
              $('#exampleModal').modal('toggle');
            },

            eventClick:function (info) {

              $("#btnAgregar").prop("disabled",true);
              $("#btnModificar").prop("disabled",false);
              $("#btnBorrar").prop("disabled",false);
              $('#txtID').val(info.event.id);

                mes = (info.event.start.getMonth()+1)
                dia = (info.event.start.getDate())
                anio = (info.event.start.getFullYear())

                mes = (mes<10)?"0"+mes:mes;
                dia = (dia<10)?"0"+dia:dia;

              $('#title').val(info.event.title);
              $('#txtFecha').val(anio+"-"+mes+"-"+dia);
              $('#id_user').val(info.event.id_user);
              $('#color').val(info.event.backgroundColor);
              $('#descripcion').val(info.event.extendedProps.descripcion);
              $('#estatus').val(info.event.extendedProps.estatus);
              $('#exampleModal').modal();
            },

            events:"{{ route('calendar.show_calendar_user') }}",

              eventContent: function(arg) {

                let arrayOfDomNodes = []
                let contenedorEventWrap = document.createElement('div');

                let titleArg = arg.event.title;
                let imageArg = arg.event.extendedProps.image;
                let checkArg = arg.event.extendedProps.check;

                if (checkArg == 1){
                    let imgEvent = '<img width="16px" height="16px" style="margin-left: 10px" src="'+imageArg+'" >';
                    let titleEvent ='<p> '+ titleArg+'</p>';

                    contenedorEventWrap.classList = "d-flex ml-5";
                    contenedorEventWrap.innerHTML = imgEvent+titleEvent;

                    arrayOfDomNodes = [contenedorEventWrap ]
                    return { domNodes: arrayOfDomNodes }
                }

              },
        });

        calendar.setOption('locale','Es');
        calendar.render();

        $('#btnAgregar').click(function(){
            ObjEvento= recolectarDatosGUI('POST');
            {{--EnviarInformacion('{{route('calendar.index_calendar_user')}}', ObjEvento);--}}
            EnviarInformacion('', ObjEvento);
        });

        $('#btnBorrar').click(function(){
            ObjEvento= recolectarDatosGUI('DELETE');
            EnviarInformacion('/destroy/'+$('#txtID').val(), ObjEvento);
        });

        $('#btnModificar').click(function(){
            ObjEvento= editarDatosGUI('PATCH');
            EnviarInformacion('/update/'+$('#txtID').val(), ObjEvento);
        });

        function recolectarDatosGUI(method){
            colorAlert =("#2ECC71");
            estatusDefault = 0;

            nuevoEvento={
                id:$('#txtID').val(),
                title:$('#title').val(),
                id_user:$('#id_user').val(),
                descripcion:$('#descripcion').val(),
                estatus:$('#estatus').val()+estatusDefault,
                color:$('#color').val()+colorAlert,
                start:$('#txtFecha').val(),
                end:$('#txtFecha').val(),
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
            return (nuevoEvento);
        }

        function editarDatosGUI(method){
            nuevoEvento={
                id:$('#txtID').val(),
                title:$('#title').val(),
                id_user:$('#id_user').val(),
                descripcion:$('#descripcion').val(),
                estatus:$('#estatus').val(),
                color:$('#color').val(),
                // start:$('#txtFecha').val(),
                // end:$('#txtFecha').val(),
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
            return (nuevoEvento);
        }

        function EnviarInformacion(accion,ObjEvento){
            $.ajax(
                    {
                       type:"POST",
                         url: "{{route('calendar.store_calendar_user')}}"+accion,
                        data:ObjEvento,
                        success:function (msg){
                              console.log(msg);
                              $('#exampleModal').modal('toggle');
                              calendar.refetchEvents();
                             },
                        error:function(){alert("hay un error");}
                    }
                );
        }

        function limpiarFormulario(){
              $('#txtID').val("");
              $('#title').val("");
              $('#id_user').val("");
              $('#txtFecha').val("");
              $('#color').val("");
              $('#descripcion').val("");
              $('#estatus').val("");
        }
      });

    </script>

@endsection

                <div class="row" style="">

                    <div class="col"></div>
                        <div class="col-12">
                            <div class="container">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    <div class="col"></div>

                </div>

                @include('alerts.modal')




