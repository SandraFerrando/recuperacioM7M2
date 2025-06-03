<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Un ítem pertany a una comanda
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Un ítem pertany a un producte
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
