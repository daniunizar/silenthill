<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->lastname = 'silenthill';
        $admin->dni = "59418119B"; //fake
        $admin->email = 'admin@silenthill.com';
        $admin->birthdate = '2022-01-01';
        $admin->password = password_hash('adminadmin', PASSWORD_DEFAULT);
        $admin->gender_id = 3;//3==others
        $admin->email_verified_at = '2021-12-01 15:07:47';
        $admin->save();
    }
}
