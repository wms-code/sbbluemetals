<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table='accounts';
    protected $guarded=[];

    public function accountsgroups()
    {
        return $this->hasOne(AccountsGroup::class, 'id', 'accounts_groups_id');
    }
    protected function report()
    {
        return $this->select('id','name') 
        //->whereIn('id', array(11,12,14,15))
        ->orderBy('name')
        ->get();
    }
}
