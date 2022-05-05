@extends('layouts.plantilla')
 
@section ('title', 'Curso')
 
@section('content')
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<a href="{{route('cursos.create')}}">Create curso</a>
 
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Laravel 5.8 Ajax CRUD Application - W3Adda.com</h2><br>
    <div class="row">
        <div class="col-12">
         <!--   <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-post">Add post</a> -->
          <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#Create">
            Agregar
            </button>
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Edad</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody id="posts-crud">
         
           
                @foreach($personal as $indice=>$valor)
                <tr>
                    <td><a >{{$valor["id"]}}</a></td>
                    <td><a href="{{route('cursos.show', $valor['id'])}}">{{$valor["nombre"]}}</a></td>
                    <td><a >{{$valor["edad"]}}</a></td>
                    <td><a href="javascript:void(0)" id="edit-post" data-id="" class="btn btn-info" data-toggle="modal" data-target="#Edit">Edit</a></td>
                   <td><a href="javascript:void(0)" id="delete-post" data-id="" class="btn btn-danger delete-post"data-toggle="modal" data-target="#Eliminar" >Delete</a></td>
                   </tr>
                   @endforeach
           </tbody>
          </table>
     
       </div>
    </div>
</div>
 
 
<!-- The Modal CREAR -->
<div class="modal" id="Create">
  <div class="modal-dialog">
    <div class="modal-content">
 
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
 
      <!-- Modal body -->
      <div class="modal-body">
     
        <form id="postForm" name="postForm" class="form-horizontal" >
           <input type="hidden" name="post_id" id="post_id">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="title" name="nombre"  required="">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Edad</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="title" name="edad"  required="">
                </div>
            </div>
   
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit"  onclick='proccess();' class="btn btn-primary" id="btn-save" value="create">Save
             </button>
            </div>
        </form>
    </div>
 
   
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
 
    </div>
  </div>
</div>
 
<script type="text/javascript">
 
function proccess(){
  console.log('funcina');
  var formulario=document.getElementById('postForm');
  var resp=document.getElementById('resp');
 
 
  formulario.addEventListener('submit', function (e){
  e.preventDefault();
  console.log('mediste un click');
  var data= new FormData(postForm);
  console.log(data.get('nombre'));
  console.log(data.get('edad'));
     
      fetch('{{route('cursos.storefetch')}}',{
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
          method:'POST',
          body: data
      })
 
          .then(res=> res.json())
          .then(data=>{
              console.log(data)
             // alert(result.message);
     
              })
     
  })
 
}
 
</script>
 
 
<!-- The Modal EDITAR-->
<div class="modal" id="Edit">
  <div class="modal-dialog">
    <div class="modal-content">
 
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
 
      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>
 
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
 
    </div>
  </div>
</div>
 
 
 
<!-- The Modal -->
<div class="modal" id="Eliminar">
  <div class="modal-dialog">
    <div class="modal-content">
 
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
 
      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>
 
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
 
    </div>
  </div>
</div>
 
 
 
@endsection
 
 



