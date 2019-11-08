<?php

namespace App\Model;
 
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    protected $table='colours';
    protected $guarded=[];
   
    protected function getall()
    {
        return $this->select('id','name')        
        ->orderBy('name')
        ->get();
    }
}
