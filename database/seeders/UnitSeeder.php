<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('units')->insert([
            'name' => rand(0, 10).Str::random(10),
            'project_id' =>rand(0,15)
        ]);
    }
}
