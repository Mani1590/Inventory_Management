<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    
    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'submitted_at'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'price' => 'decimal:2',
        'submitted_at' => 'datetime'
    ];

    // Accessor for total value
    public function getTotalValueAttribute()
    {
        return $this->quantity * $this->price;
    }
}