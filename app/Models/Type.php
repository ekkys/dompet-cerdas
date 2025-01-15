<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['enum'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'id_type');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_type');
    }
}
