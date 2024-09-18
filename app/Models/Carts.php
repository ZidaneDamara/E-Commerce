<?php

// app/Models/Cart.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    } 
    public function product()
    {
        return $this->belongsTo(Product::class);
    } 
}