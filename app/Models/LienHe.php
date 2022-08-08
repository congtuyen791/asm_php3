<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;
    protected $table = 'lien_he';
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
