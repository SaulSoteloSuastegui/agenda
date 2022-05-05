 
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
           
           
           <div class="mb-3">
           <label for="start">start</label>
           <input type="datetime-local" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
         </div>


          <div class="mb-3">
           <label for="end">end</label>
           <input type="datetime-local" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="Escribe el titulo del evento">
         </div>


function proccess(){
    console.log('funciona');
    var formulario=document.getElementById('postForm');
    var resp=document.getElementById('resp');
   
   
    document.getElementById("btnGuardar").addEventListener("click",function(){

    console.log('mediste un click');
    var data= new FormData(postForm);
    console.log(data.get('nombre'));
    console.log(data.get('edad'));
       
        fetch('/evento/agregar',{
          headers:{
            'X-CSRF-TOKEN': _token.value,
            'Content-Type':'application/json'
        },
            method:'',
            body: data
        })
            .then(res=> res.json())
            .then(data=>{
                console.log(data)
               // alert(result.message);
                })
       
    })
   
  }
   
  