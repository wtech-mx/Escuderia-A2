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
            initialView: 'listMonth',
            navLinks: false,
            editable: true,
            dayMaxEvents: 3,

            headerToolbar:{
              left:'prev,next today',
              center:'title',
              right: 'listMonth,dayGridMonth'
            },

            views: {
            dayGridMonth: { buttonText: 'MES' },
            listMonth: { buttonText: 'LISTA' }
          },

              dateClick:function (info) {

              limpiarFormulario();
              $('#txtFecha').val("");
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

              $('#txtFecha').val(anio+"-"+mes+"-"+dia);

              $('#id_user').val(info.event.extendedProps.id_user);
              $('#title').val(info.event.title);
              $('#color').val(info.event.backgroundColor);
              $('#descripcion').val(info.event.extendedProps.descripcion);
              $('#estatus').val(info.event.extendedProps.estatus);
              $('#check').val(info.event.extendedProps.check);
              $('#image').val(info.event.extendedProps.image);
              $('#exampleModal').modal();

              console.log('Fecha', dia)
            },

            events:"{{ route('calendar.show_calendar') }}",

              eventContent: function(arg) {

                let arrayOfDomNodes = []
                let contenedorEventWrap = document.createElement('div');

                let titleArg = arg.event.title;
                let imageArg = arg.event.extendedProps.image;
                let checkArg = arg.event.extendedProps.check;

                if (checkArg == 1){
                    let imgEvent = '<img width="16px" height="16px" style="margin-left: 10px" src="'+imageArg+'" >';
                    let titleEvent ='<p> </p>';

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
            {{--EnviarInformacion('{{route('calendar.index_calendar')}}', ObjEvento);--}}
            EnviarInformacion('', ObjEvento);
        });

        $('#btnBorrar').click(function(){
            ObjEvento= editarDatosGUI('PATCH');
            EnviarInformacion('/destroy/'+$('#txtID').val(), ObjEvento);
        });

        $('#btnModificar').click(function(){
            ObjEvento= editarDatosGUI('PATCH');
            EnviarInformacion('/update/'+$('#txtID').val(), ObjEvento);
        });

        function recolectarDatosGUI(method){
            colorAlert =("#2ECC71");
            estatusDefault = 0;
            checkDefault = 0;
            imageDefault = ("{{asset('img/icon/color/comprobado.png') }}");

            nuevoEvento={
                id:$('#txtID').val(),
                title:$('#title').val(),
                id_user:$('#id_user').val(),
                descripcion:$('#descripcion').val(),
                estatus:$('#estatus').val()+estatusDefault,
                check:$('#check').val()+checkDefault,
                image:$('#image').val()+imageDefault,
                color:$('#color').val()+colorAlert,
                end:$('#txtFecha').val(),
                start:$('#txtFecha').val(),
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
            console.log('Fecha nuevo',nuevoEvento)
            return (nuevoEvento);
        }

        function editarDatosGUI(method){
            nuevoEvento={
                id:$('#txtID').val(),
                title:$('#title').val(),
                id_user:$('#id_user').val(),
                descripcion:$('#descripcion').val(),
                estatus:$('#estatus').val(),
                check:$('#check').val(),
                image:$('#image').val(),
                color:$('#color').val(),
                start:$('#txtFecha').val(),
                end:$('#txtFecha').val(),
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
            console.log('Fecha nuevo 1',nuevoEvento)
            return (nuevoEvento);
        }

        function EnviarInformacion(accion,ObjEvento){
            $.ajax(
                    {
                       type:"POST",
                         url: "{{route('calendar.store_calendar_user')}}"+accion,
                        data:ObjEvento,
                        success:function (msg){
                              console.log('Mensaje',msg);
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
              $('#check').val("");
              $('#image').val("");
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

                @include('admin.alerts.modal')

