<?php

// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code', 'product_name', 'category_id', 'product_price', 'product_description', 'product_stock', 'cover', 'photo'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}