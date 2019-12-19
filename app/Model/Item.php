<?php

namespace App\Model;
 
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table='item';
    protected $guarded=[];
   
    protected function getall()
    {
        return $this->select('id','name','tamil')        
        ->orderBy('name')
        ->get();
    }
}
