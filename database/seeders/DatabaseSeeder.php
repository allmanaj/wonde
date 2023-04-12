<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'steven.dumbell@school.com',
            'name' => 'Steven Dumbell',
            'api_id' => 'A921160679'
        ]);
        User::factory()->create([
            'email' => 'ruth.hatchett@school.com',
            'name' => 'Ruth Hatchett',
            'api_id' => 'A593143780'
        ]);
        User::factory()->create([
            'email' => 'selina.andrews@school.com',
            'name' => 'Selina Andrews',
            'api_id' => 'A500460806'
        ]);
    }
}
