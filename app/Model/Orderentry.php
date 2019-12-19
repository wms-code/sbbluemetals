<?php

namespace App\Model;
use DB;
use Illuminate\Database\Eloquent\Model;

class Orderentry extends Model
{
     protected $table='orderentry';
     protected $guarded=[];
    
     protected function getall()
    {
      return DB::table('orderentry')
              ->leftJoin('accounts as masparty', 'orderentry.pty_code', '=', 'masparty.id')
              ->leftJoin('item', 'item.id', '=', 'orderentry.item_code')
              ->leftJoin('place', 'place.id', '=', 'orderentry.to_code')
              ->leftJoin('accounts as masvehicle', 'orderentry.vehicle_code', '=', 'masvehicle.id')
              ->select('ordernumber','order_date','total_unit','masparty.name as partyname','amount',
               'place.name as deliveryplace','masvehicle.name as vehiclename',
               'remarks','item.name as itemname')  
              ->orderBy('ordernumber', 'asc')
              ->orderBy('order_date', 'asc')
              ->paginate(10);    
 
    }

     protected function getcustomer()
     {
        $value=DB::table('accounts') 
         ->select('id','name') 
        // ->whereIn('id', array(30,31,32))
         ->orderBy('name')
         ->get();
         return $value;
     }
     protected function getvehicle()
     {
        $value=DB::table('accounts') 
         ->select('id','name') 
        // ->whereIn('id', array(30,31,32))
         ->orderBy('name')
         ->get();
         return $value;
     }

     protected function getdriver()
     {
        $value=DB::table('accounts') 
         ->select('id','name') 
        // ->whereIn('id', array(30,31,32))
         ->orderBy('name')
         ->get();
         return $value;
     }
     protected function getjcb()
     {
        $value=DB::table('accounts') 
         ->select('id','name') 
        // ->whereIn('id', array(30,31,32))
         ->orderBy('name')
         ->get();
         return $value;
      }

      protected function getopeartor()
     {
        $value=DB::table('accounts') 
         ->select('id','name') 
        // ->whereIn('id', array(30,31,32))
         ->orderBy('name')
         ->get();
         return $value;
   
     }

     protected function getplace()
     {
        $value=DB::table('place') 
         ->select('id','name')  
         ->orderBy('name')
         ->get();
         return $value;
     }

     protected function getitem()
     {
        $value=DB::table('item') 
         ->select('id','name')  
         ->orderBy('name')
         ->get();
         return $value;
     }


}
