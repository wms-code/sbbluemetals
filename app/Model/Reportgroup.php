<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reportgroup extends Model
{
    protected $table='reportgroup';
    protected $guarded=[];

    
    protected function gstreportgroup()
    {
        return $this->select('id','name')        
        ->orderBy('name')
        ->get();
    }
}
