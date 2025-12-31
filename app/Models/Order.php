<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'total_amount',
        'active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
