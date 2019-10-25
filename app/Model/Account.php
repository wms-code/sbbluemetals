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
}
