<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'price',
        'discount',
        'quantity',
        'totalBuy',
        'imageName',
        'description',
        'shop',
        'createdAt',
        'updatedAt',
        'startsAt',
        'endsAt'
    ];

    // Nếu cột thời gian không phải created_at / updated_at mặc định:
    public $timestamps = false;
}
