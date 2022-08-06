<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'size';
    protected $fillable = [
        'name'
    ];
    public function products() {
        return $this->hasMany(Size::class, 'category_id', 'id');
    }
}
