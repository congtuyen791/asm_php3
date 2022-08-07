<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = 'orders';
    protected $fillable = [
        'user_id',
        'product_id',
        'ngay_giao',
        'noi_giao_hang',
        'status',
        'tong_tien'
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
