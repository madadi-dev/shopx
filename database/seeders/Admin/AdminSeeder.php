<?php

namespace Database\Seeders\Admin;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->name = "Super Admin";
        $admin->email = "admin@shopx.com";
        $admin->password = bcrypt("Password");
        $admin->save();
    }
}
