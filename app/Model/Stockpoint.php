<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Stockpoint extends Model
{
    protected $table='stockpoints';
    protected $guarded=['active'];
   
}
