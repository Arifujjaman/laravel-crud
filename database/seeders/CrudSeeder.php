<?php

namespace Database\Seeders;
use App\Models\Crud;
use Illuminate\Database\Seeder;

class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crud::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 200; $i++) {
            Crud::create([
                'Name'  => $faker->name,
                'email' => $faker->email               
            ]);
        }
    }
}
