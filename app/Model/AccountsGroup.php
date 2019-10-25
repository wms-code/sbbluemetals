<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountsGroup extends Model
{
    //


    protected function accountscategory()
    {
        return $this->select('id','name') 
        ->whereIn('id', array(11,12,14,15))
        ->orderBy('name')
        ->get();
    }
}
