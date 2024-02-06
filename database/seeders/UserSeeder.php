<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AuthUser::created([
            'name' => 'Jhan Pool Agudelo',
            'name' => 'jhan@jhan.jhan',
            'name' => bcrypt('12345678'),
        ]);

        User::factory(99)->create();
    }
}
