<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    //
    public function index(){
        return view('evento.index');
    }

    public function store(Request $request){

      $evento=Evento::create($request->all());
         return $request->all();
            
      //  $title = $request->input('title');
    //  $message = "Title:".$title."";
    //  echo json_encode($message);
    }

    public function show(Evento $evento){
        $evento=Evento::all();
        return response()->json($evento);
     }
}
