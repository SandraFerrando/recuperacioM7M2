<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'shipping_address',
        'payment_method',
    ];

    // Una comanda pertany a un usuari
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Una comanda té molts ítems
    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
