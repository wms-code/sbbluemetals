<?php

namespace App\Model;
 
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;
use DB;
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
    protected function getunit()
    {
       $value=DB::table('units') 
        ->select('id','name')     
        ->orderBy('name')
        ->get();
        return $value;
    }
}
