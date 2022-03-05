<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;
class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender();
        $gender->concept = "Male";
        $gender->save();
        $gender = new Gender();
        $gender->concept = "Female";
        $gender->save();
        $gender = new Gender();
        $gender->concept = "Others";
        $gender->save();
    }
}
