<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class KnittedFabInward extends Model
{
     protected $table='knitted_fab_inwards';
     protected $guarded=[];
    
     protected function getall()
    {
      return DB::table('knitted_fab_inwards')
              ->leftJoin('accounts', 'knitted_fab_inwards.party_code', '=', 'accounts.id')
              ->select('inward_number','inward_date','net_value','sub_total','total_weight','reference','name')  
              ->orderBy('inward_date', 'asc')
              ->paginate(10);    

       // return $this->select('inward_number','inward_date','net_value','sub_total','total_weight','reference')        
       // ->orderBy('inward_date')      
       // ->paginate(10);   
        
    }

     protected function getsupplier()
     {
        $value=DB::table('accounts') 
         ->select('id','name') 
         //->whereIn('id', array(11,12,14,15))
         ->orderBy('name')
         ->get();
         return $value;
     }
     public static function getcolour()
     {

        $value=DB::table('apps_countries')->orderBy('id', 'asc')->get(); 
   
        return $value;
      }

      public static function getcolour1(){

       // $value=DB::table('employees')->where('department', $departmentid)->get();
       $value=DB::table('apps_countries')->orderBy('id', 'asc')->get(); 
   
        return $value;
      }
}
