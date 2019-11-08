<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{  
    protected $table='counts';
    protected $guarded=['active'];
    
    protected function getall()
    {
        return $this->select('id','name')        
        ->orderBy('name')
        ->get();
    }
}
