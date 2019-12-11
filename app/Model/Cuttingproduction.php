<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Cuttingproduction extends Model
{
     protected $table='cuttingproduction1';
     protected $guarded=[];
    
     protected function getall()
    {
      return DB::table('cuttingproduction1')
              ->leftJoin('accounts', 'cuttingproduction1.emp_code', '=', 'accounts.id')
              ->select('productionnumber','production_date','total_pcs',
               'name','remarks')  
              ->orderBy('productionnumber', 'asc')
              ->orderBy('production_date', 'asc')
              ->paginate(10);    
 
    }

     protected function getstaff()
     {
        $value=DB::table('accounts') 
         ->select('id','name') 
         ->whereIn('id', array(30,31,32))
         ->orderBy('name')
         ->get();
         return $value;
     }
     protected function getfrn()
     {
        $value=DB::table('knitted_fab_details') 
         ->select('inwardnumber','frnnumber')           
         ->orderBy('frnnumber')
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
