<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stategst extends Model
{
    protected $table='stategst';
    protected $guarded=[];

    
    protected function gststate()
    {
        return $this->select('id','name','statecode')        
        ->orderBy('name')
        ->get();
    }
    
}
