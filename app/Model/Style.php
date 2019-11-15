<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table='style';
    protected $guarded=['active'];
  
}
