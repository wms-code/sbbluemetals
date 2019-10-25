<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Stockpoint extends Model
{
    //
    protected $table='stockpoints';
    protected $guarded=['active'];
    protected function add($rec)
    {
       if(isset($rec['name']))
       {
           
           $data['name']=$rec['name'];
           $data['rack']=$rec['rack'];
           return $this->create($data);
       }else
       { 
           return false;
       }

      
    }
}
