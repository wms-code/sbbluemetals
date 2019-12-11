<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;
use DB;
class Style extends Model
{
    protected $table='style';
    protected $guarded=['active'];
  
    protected function getall()
    {
       $value=DB::table('Style') 
        ->select('id','name','size_code') 
        ->orderBy('name')
        ->get();
        return $value;
    }
}
