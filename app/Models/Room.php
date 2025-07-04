<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
    'nama',
    'room_type_id',
    'harga',
    'status',
    ];


    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

} 