<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountsGroup extends Model
{
    protected $table='accounts_groups';
    protected $guarded=[];

    protected function accountscategory()
    {
        return $this->select('id','name') 
        //->whereIn('id', array(11,12,14,15))
        ->orderBy('name')
        ->get();
    }
    
    protected function subgroup()
    {
        return $this->select('id','name') 
        ->whereIn('id', array(11,12,14,15))
        ->orderBy('name')
        ->get();
    }
    protected function getall()
    {
        return $this->select('id','name')      
        ->orderBy('name')
        ->get();
    }
}
