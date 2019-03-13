<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   /* protected $fillable = [
        'account_number' , 'account_name', 'account_type', 'balance_date', 'currency', 'opening_available_balance', 'assigned_user_id'
    ];
*/
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}