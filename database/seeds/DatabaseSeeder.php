<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Personal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        //$this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PersonalsTableSeeder::class);
    }
}
