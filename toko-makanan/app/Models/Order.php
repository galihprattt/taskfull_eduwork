<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Tambahkan properti fillable
    protected $fillable = ['customer_name', 'customer_phone', 'customer_address', 'total_price'];

    // Jika perlu, tambahkan relasi:
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
