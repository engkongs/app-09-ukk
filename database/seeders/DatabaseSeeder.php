<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'fauzi',
                'email' => 'fabdullahbaihaki@gmail.com',
                'password' => Hash::make('password'),
                'nomor_telepon' => '085811198578',
                'alamat' => 'jl.kelinci',
                'role' => 'admin',

            ]
            ]);
            User::insert([
                [
                    'name' => 'pasya',
                    'email' => 'pasya@gmail.com',
                    'password' => Hash::make('password'),
                    'nomor_telepon' => '085811848212',
                    'alamat' => 'jl.kelelawar',
                    'role' => 'petugas',
    
                ]
                ]);

            User::insert([
                    [
                        'name' => 'fadli',
                        'email' => 'fadli@gmail.com',
                        'password' => Hash::make('password'),
                        'nomor_telepon' => '0858231414',
                        'alamat' => 'jl.buaya',
                        'role' => 'peminjam',
        
                    ]
                    ]);

            
        User::factory(5)->create();
    }
}
