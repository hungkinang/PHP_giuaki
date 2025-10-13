<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nếu bảng của bạn tên là "product" (số ít)
    protected $table = 'product';

    // Cho phép fill các cột
    protected $fillable = [
        'name',
        'price',
        'discount',
        'quantity',
        'totalBuy',
        'image',
        'description',
        'created_at',
        'updated_at'
    ];
}
