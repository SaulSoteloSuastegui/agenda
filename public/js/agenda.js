 document.addEventListener('DOMContentLoaded', function() {

        var formulario = document.getElementById('formulario');
        var calendarEl = document.getElementById('agenda');

        var calendar = new FullCalendar.Calendar(calendarEl, {

          initialView: 'dayGridMonth',
          locale:"es",

          //events: "http://localhost/agenda/public/evento/mostrar",
          dateClick:function(){
            $("#evento").modal("show");
          }
        })


        calendar.render();

        document.getElementById("btnGuardar").addEventListener("click",function(){

            var datos = new FormData(formulario);

           console.log(dat.get('title'));
        
           fetch( 'http://localhost/agenda/public/evento/agregar'  ,{
            headers:{
              "Content-Type": "application/json",
              "Accept": "application/json",
              "X-Requested-With": "XMLHttpRequest",
              "X-CSRF-Token": $('input[name="_token"]').val()
          },
              method:'POST',
              body:datos
          })
       
          .then(res=> res.json())
          .then(data=>{
              console.log(data)
            // $("#evento").modal("hide");
              })


        })
    
})