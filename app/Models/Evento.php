<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
  /*
    static $rules=[
        'title'=>'required',
        'sala'=>'required'
      'descripcion'=>'requiered',
        'start'=>'required',
        'end'=>'required'
    ];*/

   //protected $fillable=['title','sala','descripcion','start','end'];
    
   protected $fillable=['title','sala','descripcion','start','end'];

}
