<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'type',
        'user_id',
    ];

    public function category()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
