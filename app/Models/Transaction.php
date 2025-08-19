<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'transaction_ref',
        'transaction_type',
        'transaction',
        'wallet_address',
        'wallet_type',
        'transaction_amount',
        'transaction_description',
        'transaction_status',
        'account_name',
        'account_number',
        'account_type',
        'bank_name',
        'routing_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
