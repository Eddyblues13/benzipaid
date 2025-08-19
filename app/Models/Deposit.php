<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',  // Add this line
        'front_cheque',
        'back_cheque',
        'deposit_type',
        'status',
        // Add any other fields that should be mass assignable
    ];
}
