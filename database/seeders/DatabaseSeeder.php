<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Costomer;
use App\Models\Employ;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // Other seeders if you have them
        ]);
        Product::factory()->times(20)->create();
        Costomer::factory()->times(20)->create();
        Employ::factory()->times(20)->create();
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PermissionAssignSeeder::class);
    }

}
