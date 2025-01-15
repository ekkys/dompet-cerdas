<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'id_type'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }
}
