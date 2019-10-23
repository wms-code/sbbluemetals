<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colours extends Model
{
    protected $table='colours';

    protected $PrimaryKey='id';

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
