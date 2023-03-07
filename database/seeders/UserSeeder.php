<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ferdy Hahan Pradana',
            'email' => 'ferdyhahan5@gmail.com',
            'password' => bcrypt('password'),
            'picture' => 'user-picture/user1.jpg'
        ]);

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 5; $i++) {

            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
