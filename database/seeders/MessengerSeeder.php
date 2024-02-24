<?php

namespace Database\Seeders;

use App\Models\Messenger;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Messenger::factory()->count(5)->create();
        Messenger::factory()->count(100)->create();
    }
}
