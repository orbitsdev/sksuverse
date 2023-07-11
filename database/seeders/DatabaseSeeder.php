<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $roles = ['admin','instructor','student'];

        foreach ($roles as $role) {
           Role::create([
                'name' => $role
         ]);
        }

      

            $users = [
                [
                    'name' => 'Admin User',
                    'email' => 'admin@gmail.com',
                    'role' => 'admin',
                ],
                [
                    'name' => 'Instructor User',
                    'email' => 'instructor@gmail.com',
                    'role' => 'instructor',
                ],
                [
                    'name' => 'Student User',
                    'email' => 'student@gmail.com',
                    'role' => 'student',
                ]
            ];
            
            foreach ($users as $user) {
                $role = Role::where('name', $user['role'])->first();
                if ($role) {
                    $createdUser = User::create([
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'password' => Hash::make('password')
                    ]);
                    $createdUser->roles()->attach($role->id);
                }
            }

    

      


        // $this->call([
        //     RoleSeeder::class,
        //     UserSeeder::class,
        // ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
