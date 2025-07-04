<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\RoomType;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['tersedia', 'terisi'];

        $roomTypes = RoomType::all();

        foreach ($roomTypes as $type) {
            for ($i = 1; $i <= 5; $i++) {
                Room::create([
                    'nama' => $type->nama . ' Room ' . $i,
                    'room_type_id' => $type->id,
                    'harga' => rand(300000, 1000000),
                    'status' => $statuses[array_rand($statuses)],
                ]);
            }
        }
    }
}
