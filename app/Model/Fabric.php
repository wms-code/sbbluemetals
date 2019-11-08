<?php
namespace App\Model;
use App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $table='fabrics';
    protected $guarded=[];

    public function fabricgroups()
    {
        return $this->hasOne(FabricGroup::class, 'id', 'fabricgroup_code');
    }
    protected function getall()
    {
        return $this->select('id','name')        
        ->orderBy('name')
        ->get();
    }
   
}
