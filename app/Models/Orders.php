<?php

namespace App\Models;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['userId', 'status', 'deliveryMethod', 'deliveryPrice', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'orderId');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($order) {
            $order->items()->delete();
        });
    }
}

