<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['id_type', 'id_wallet', 'jumlah', 'description'];

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'id_wallet');
    }
}
