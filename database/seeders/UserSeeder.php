<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email','cesar@celke.com')->first()){
            $superAdmin=User::create([
                'name' => 'Cesar',
                'email' => 'cesar@celke.com',
                'password' => Hash::make('123456a', ['rounds' => 12]),
            ]);
        }
        
        if(!User::where('email','maria@example.com')->first()){
            $superAdmin=User::create([
                'name' => 'Maria',
                'email' => 'maria@example.com',
                'password' => Hash::make('senha123', ['rounds' => 12]),
            ]);
        }
        
        if(!User::where('email','joao@example.com')->first()){
            $superAdmin=User::create([
                'name' => 'João',
                'email' => 'joao@example.com',
                'password' => Hash::make('senha1234', ['rounds' => 12]),
            ]);
        }
        
        if(!User::where('email','ana@example.com')->first()){
            $superAdmin=User::create([
                'name' => 'Ana',
                'email' => 'ana@example.com',
                'password' => Hash::make('senha5678', ['rounds' => 12]),
            ]);
        }
        
        if(!User::where('email','pedro@example.com')->first()){
            $superAdmin=User::create([
                'name' => 'Pedro',
                'email' => 'pedro@example.com',
                'password' => Hash::make('senha9999', ['rounds' => 12]),
            ]);
        }
        
        if(!User::where('email','lucas@example.com')->first()){
            $superAdmin=User::create([
                'name' => 'Lucas',
                'email' => 'lucas@example.com',
                'password' => Hash::make('pass123', ['rounds' => 12]),
            ]);
        }
        
        if(!User::where('email','julia@example.com')->first()){
            $superAdmin=User::create([
                'name' => 'Julia',
                'email' => 'julia@example.com',
                'password' => Hash::make('password987', ['rounds' => 12]),
            ]);
        }
    }
}
