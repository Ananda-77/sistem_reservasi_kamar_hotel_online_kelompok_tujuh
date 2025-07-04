<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'tipe', 'harga', 'status',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
} 