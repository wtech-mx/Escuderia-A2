@section('scripts')
 <link href="{{ asset('fullcalendar/core/main.css') }}" rel="stylesheet">
 <link href="{{ asset('fullcalendar/daygrid/main.css') }}" rel="stylesheet">
 <link href="{{ asset('fullcalendar/list/main.css') }}" rel="stylesheet">
 <link href="{{ asset('fullcalendar/timeGrid/main.css') }}" rel="stylesheet">

 <script src="{{ asset('fullcalendar/core/main.js') }}"></script>
 <script src="{{ asset('fullcalendar/interaction/main.js') }}"></script>
 <script src="{{ asset('fullcalendar/daygrid/main.js') }}"></script>
 <script src="{{ asset('fullcalendar/timeGrid/main.js') }}"></script>
 <script src="{{ asset('fullcalendar/list/main.js') }}"></script>

<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

          defaultDate:new Date(2021,02,01),
           plugins: [ 'dayGrid', 'list','interaction' ],
            // defaultView:'timeGridWeek'

            header:{
              left:'prev,next today',
              center:'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
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

              // datos base
              console.log(info);
              console.log(info.event.title);
              console.log(info.event.start);
              console.log(info.event.end);

              console.log(info.event.textColor);
              console.log(info.event.backgroundColor);

              //propiedades extendidas
              console.log(info.event.extendedProps.description);

              $('#txtID').val(info.event.id);
              $('#txtTitulo').val(info.event.title);

                mes = (info.event.start.getMonth()+1)
                dia = (info.event.start.getDay())
                anio = (info.event.start.getFullYear())

                mes = (mes<10)?"0"+mes:mes;
                dia = (dia<10)?"0"+dia:dia;

                minutos = info.event.start.getMinutes();
                hora = info.event.start.getHours();

                minutos = (minutos<10)?"0"+minutos:minutos;
                hora = (hora<10)?"0"+hora:hora;


                horario =(hora+":"+minutos);

              $('#txtFecha').val(anio+"-"+mes+"-"+dia);
              $('#txtHora').val(horario);
              $('#txtColor').val(info.event.backgroundColor);

              $('#txtDescription').val(info.event.extendedProps.description);

              $('#exampleModal').modal();
            },


            events:"{{ url('/admin/eventos/show')  }}"

        });
        calendar.setOption('locale','Es');

        calendar.render();

        $('#btnAgregar').click(function(){
            ObjEvento= recolectarDatosGUI('POST');
            EnviarInformacion('', ObjEvento);
        });

        $('#btnBorrar').click(function(){
            ObjEvento= recolectarDatosGUI('DELETE');
            EnviarInformacion('/destroy/'+$('#txtID').val(), ObjEvento);
        });

        $('#btnModificar').click(function(){
            ObjEvento= recolectarDatosGUI('PATCH');
            EnviarInformacion('/update/'+$('#txtID').val(), ObjEvento);
        });

        function recolectarDatosGUI(method){
            nuevoEvento={
                id:$('#txtID').val(),
                title:$('#txtTitulo').val(),
                description:$('#txtDescription').val(),
                color:$('#txtColor').val(),
                textColor:'#ffffff',
                start:$('#txtFecha').val()+$('#txtHora').val(),
                end:$('#txtFecha').val()+$('#txtHora').val(),

                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
            console.log(nuevoEvento)
            return (nuevoEvento);

        }

        function EnviarInformacion(accion,ObjEvento){
            $.ajax(
                    {
                       type:"POST",
                        {{--url:"{{ url('/') }}"+accion,--}}
                         url: "{{route('eventos.store_eventos')}}"+accion,
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
              $('#txtTitulo').val("");
              $('#txtFecha').val("");
              $('#txtHora').val("");
              $('#txtColor').val("");
              $('#txtDescription').val("");
        }

      });

    </script>

@endsection


                <div class="row" style="">

                    <div class="col"></div>
                        <div class="col-9">
                            <div id='calendar'></div>
                        </div>
                    <div class="col"></div>

                </div>

@include('admin.eventos.modal')

