<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $user = User::create([
            'name'=> 'Administrator',
            'email'=>'admin@gmail.com',
            'role' => 'admin',
            'password'=>'12345678'
        ]);

       
        
    }
}
