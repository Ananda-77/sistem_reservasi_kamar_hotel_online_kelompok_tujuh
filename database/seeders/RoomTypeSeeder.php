<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\RoomType;

class RoomTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            ['nama' => 'Standard', 'deskripsi' => 'Kamar standar nyaman', 'gambar' => 'standard.jpg'],
            ['nama' => 'Deluxe', 'deskripsi' => 'Kamar luas dengan fasilitas lebih', 'gambar' => 'deluxe.jpg'],
            ['nama' => 'Suite', 'deskripsi' => 'Kamar eksklusif dengan ruang tamu', 'gambar' => 'suite.jpg'],
            ['nama' => 'Family', 'deskripsi' => 'Kamar besar untuk keluarga', 'gambar' => 'family.jpg'],
            ['nama' => 'Executive', 'deskripsi' => 'Kamar untuk eksekutif dan pebisnis', 'gambar' => 'executive.jpg'],
        ];

        foreach ($types as $type) {
            RoomType::create($type);
        }
    }
}
