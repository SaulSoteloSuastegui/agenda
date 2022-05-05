@extends('layouts.app')
  <!-- Scripts -->


@section('fullcalendar')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/main.min.js') }}"></script>
    <script src="{{ asset('js/locales-all.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment-with-locales.min.js'></script>
@endsection

@section('content')

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="container" >
    <div class="card col-md-11">
        <div class="card-body">
            <div id="agenda"style="height:50%;" ></div>
    
        </div>
    </div>
</div>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#evento" style="display:none;">
              Launch
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <form id="formulario" name="postForm">

                              <div class="mb-3">
                                <label for="title" class="form-label">Carpeta</label>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
                            
                              </div>
                              <div class="mb-3">
                                <label for="sala" class="form-label">Sala</label>
                                <input type="text" class="form-control" name="sala" id="sala" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
                              </div>

                                <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                              </div>

                          <div class="mb-3">
                                <label for="start" class="form-label">start</label>
                                <input type="datetime-local" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                              </div>

                              <div class="mb-3">
                                <label for="end" class="form-label">end</label>
                                <input type="datetime-local" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                      
                              </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                             <button type="button" class="btn btn-success"  id="btnGuardar">Guardar</button>
                             <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
                             <button type="button" class="btn btn-danger"  id="btnEliminar">Eliminar</button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            
                        </div>
                    </div>
                </div>
            </div>

@endsection

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {

  var formulario = document.getElementById('formulario');
  var calendarEl = document.getElementById('agenda');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    height: 520,
    initialView: 'dayGridMonth',
    locale:"es",

    events: "http://localhost/agenda/public/evento/mostrar",
    dateClick:function(info){
       var startDate =moment(info.dateStr).format('YYYY-MM-DDThh:mm');
       formulario.reset();
       console.log(startDate);
      formulario.start.value=startDate;
      $("#evento").modal("show");
    }
  })

  calendar.render();

    document.getElementById("btnGuardar").addEventListener("click",function(){

        var data = new FormData(postForm);

        fetch( '{{route('evento.store')}}' ,{
          headers:{
            
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            method:'POST',
            body:data
        })
        .then(res=> res.text())
                .then(data=>{
                  $("#evento").modal("hide");
                    })
    })

})

</script>