<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class FabricGroup extends Model
{
    protected $table='fabricgroup';
    protected $guarded=['active'];
  
}