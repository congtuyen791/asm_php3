<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'avatar',
        'promotion',
        'status',
        'category_id',
        'size_id',
    ];
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function size() {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    public function comments() {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
    public function carts() {
        return $this->belongsTo(Cart::class, 'product_id', 'id');
    }
    public function orders() {
        return $this->belongsTo(Order::class, 'product_id', 'id');
    }
}
