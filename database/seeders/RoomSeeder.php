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
        Room::create(['name' => 'Room A', 'capacity' => 40, 'description' => 'Hanya Bisa Digunakan pada hari Selasa']);
        Room::create(['name' => 'Room B', 'capacity' => 25, 'description' => 'Hanya Bisa Digunakan pada hari Kamis']);
        Room::create(['name' => 'Room C', 'capacity' => 30, 'description' => 'Hanya Bisa Digunakan pada hari Senin']);
        Room::create(['name' => 'Room D', 'capacity' => 15, 'description' => 'Hanya Bisa Digunakan pada hari Senin']);
        Room::create(['name' => 'Room E', 'capacity' => 20, 'description' => 'Hanya Bisa Digunakan pada hari Senin']);
        Room::create(['name' => 'Room F', 'capacity' => 35, 'description' => 'Hanya Bisa Digunakan pada hari Rabu']);
        Room::create(['name' => 'Room G', 'capacity' => 50, 'description' => 'Hanya Bisa Digunakan pada hari Jumat']);
        Room::create(['name' => 'Room H', 'capacity' => 10, 'description' => 'Hanya Bisa Digunakan pada hari Kamis']);
        Room::create(['name' => 'Room I', 'capacity' => 45, 'description' => 'Hanya Bisa Digunakan pada hari Rabu']);
        Room::create(['name' => 'Room J', 'capacity' => 20, 'description' => 'Hanya Bisa Digunakan pada hari Selasa']);
        Room::create(['name' => 'Room K', 'capacity' => 15, 'description' => 'Hanya Bisa Digunakan pada hari Jumat']);
        Room::create(['name' => 'Room L', 'capacity' => 30, 'description' => 'Hanya Bisa Digunakan pada hari Kamis']);
        Room::create(['name' => 'Room M', 'capacity' => 50, 'description' => 'Hanya Bisa Digunakan pada hari Senin']);
        Room::create(['name' => 'Room N', 'capacity' => 40, 'description' => 'Hanya Bisa Digunakan pada hari Selasa']);
        Room::create(['name' => 'Room O', 'capacity' => 25, 'description' => 'Hanya Bisa Digunakan pada hari Jumat']);
        Room::create(['name' => 'Room P', 'capacity' => 35, 'description' => 'Hanya Bisa Digunakan pada hari Rabu']);
        Room::create(['name' => 'Room Q', 'capacity' => 20, 'description' => 'Hanya Bisa Digunakan pada hari Kamis']);
        Room::create(['name' => 'Room R', 'capacity' => 10, 'description' => 'Hanya Bisa Digunakan pada hari Senin']);
        Room::create(['name' => 'Room S', 'capacity' => 50, 'description' => 'Hanya Bisa Digunakan pada hari Jumat']);
        Room::create(['name' => 'Room T', 'capacity' => 15, 'description' => 'Hanya Bisa Digunakan pada hari Selasa']);
        Room::create(['name' => 'Room U', 'capacity' => 45, 'description' => 'Hanya Bisa Digunakan pada hari Rabu']);
        Room::create(['name' => 'Room V', 'capacity' => 30, 'description' => 'Hanya Bisa Digunakan pada hari Jumat']);
        Room::create(['name' => 'Room W', 'capacity' => 40, 'description' => 'Hanya Bisa Digunakan pada hari Senin']);
        Room::create(['name' => 'Room X', 'capacity' => 20, 'description' => 'Hanya Bisa Digunakan pada hari Kamis']);
        Room::create(['name' => 'Room Y', 'capacity' => 25, 'description' => 'Hanya Bisa Digunakan pada hari Selasa']);
        Room::create(['name' => 'Room Z', 'capacity' => 10, 'description' => 'Hanya Bisa Digunakan pada hari Jumat']);
        Room::create(['name' => 'Room AA', 'capacity' => 15, 'description' => 'Hanya Bisa Digunakan pada hari Kamis']);
        Room::create(['name' => 'Room AB', 'capacity' => 35, 'description' => 'Hanya Bisa Digunakan pada hari Senin']);
        Room::create(['name' => 'Room AC', 'capacity' => 20, 'description' => 'Hanya Bisa Digunakan pada hari Jumat']);
        Room::create(['name' => 'Room AD', 'capacity' => 30, 'description' => 'Hanya Bisa Digunakan pada hari Rabu']);
    }
}
