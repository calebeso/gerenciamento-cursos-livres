<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '123456',
            'login' => 'admin',
            'cpf' => '000.000.000-00',
            'rg' => '000000000',
            'telefone' => '(00) 0 0000-0000',
            'endereco' => 'Rua A'
        ]);

        $user->syncRoles(1);
    }
}
