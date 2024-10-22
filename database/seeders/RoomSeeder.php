<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Room A',
            'capacity' => '40',
            'description' => 'Hanya Bisa Digunakan pada hari Selasa',
        ]);

        Room::create([
            'name' => 'Room B',
            'capacity' => '25',
            'description' => 'Hanya Bisa Digunakan pada hari Kamis',
        ]);

        Room::create([
            'name' => 'Room C',
            'capacity' => '30',
            'description' => 'Hanya Bisa Digunakan pada hari Senin',
        ]);
        Room::create([
            'name' => 'Room D',
            'capacity' => '15',
            'description' => 'Hanya Bisa Digunakan pada hari Senin',
        ]);

        Room::create([
            'name' => 'Room E',
            'capacity' => '20',
            'description' => 'Hanya Bisa Digunakan pada hari Senin',
        ]);
    }
}
