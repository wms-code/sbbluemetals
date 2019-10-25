<?php
namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $table='fabrics';
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
