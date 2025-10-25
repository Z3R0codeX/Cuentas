<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'ammount',
        'type',
        'description',
        'user_id',
        'account_id',
        'category_id',
    ];
}
