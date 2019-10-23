<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    protected $table='colours';
    protected $guarded=[];
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
