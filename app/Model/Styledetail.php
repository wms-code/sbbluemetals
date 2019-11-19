<?php

namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Styledetail extends Model
{
    protected $table='styledetail';
    //protected $guarded=['active'];
    protected $fillable = ['size_code','styleid','size1','size2','size3','size4','size5','size6','size7','size8','indx'];
    protected function getall()
    {
        return $this->select('styleid')        
        ->orderBy('styleid')
        ->get();
    }
}
