<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class KnittedFabInward extends Model
{
     protected $table='knitted_fab_inwards';
     protected $guarded=[];
     public static function getcolour(){

        $value=DB::table('apps_countries')->orderBy('id', 'asc')->get(); 
   
        return $value;
      }

      public static function getcolour1(){

       // $value=DB::table('employees')->where('department', $departmentid)->get();
       $value=DB::table('apps_countries')->orderBy('id', 'asc')->get(); 
   
        return $value;
      }
}
