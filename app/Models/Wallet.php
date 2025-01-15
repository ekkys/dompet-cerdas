<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['name', 'jumlah'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_wallet');
    }
}
