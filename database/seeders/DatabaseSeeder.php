<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        if (Role::where('name', 'admin')->first() == null) {
            Role::create(['name' => 'admin']);
        }
        if (Role::where('name', 'customer')->first() == null) {
            Role::create(['name' => 'customer']);
        }

        if(User::where('email','admin@app.com')->first() == null){
           $user = User::create([
                'email' => 'admin@app.com',
                'user_name' => 'admin',
                'name' => 'Admin Admin',
                'password' => Hash::make('password')
            ]);

            $user->syncRoles('admin');
        }

    }
}
