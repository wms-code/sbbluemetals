<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
    protected $table='units';
    protected $guarded=['active'];
    protected function add($rec)
    {
       if(isset($rec['name']))
       {
           
           $data['name']=$rec['name'];
           return $this->create($data);
       }else
       { 
           return false;
       }

      
    }
}
