<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
     
 
    protected $table='colour';

    protected $PrimaryKey='id';

    protected $guarded=[];

    public $timestamps = false;

    public $incrementing =false;

    

    public function getid()
    {
       $id=$this->latest('id')->first()->id;
       return $id+1;
    }

    protected function add($rec)
    {
       if(isset($rec['name']))
       {
           $data['id']=$this->getid();
           $data['name']=$rec['name'];
           return $this->create($data);
       }else
       { 
           return false;
       }

      
    }
}
