<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
    protected $table='units';
    protected $guarded=['active'];
  
}
