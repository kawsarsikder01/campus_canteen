<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRole;
use App\Models\User;





class UserSeeder extends Seeder
{
    // use App\Traits\HasPermissionsTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
       $user =  User::insert([
            ['name'=>'Kawsar Sikder',
            'email'=>'mdkawsarsikder01@gmail.com',
            'image'=>'kawsar.jpg',
            'password'=>bcrypt('111111'),
            'is_admin' => 1,
            'is_manager' => 0,
            'is_editor' => 0,
            'is_user' => 0,
            ]
            
        ]);
        UserRole::insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
