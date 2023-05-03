<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type1 = ['type' => 'admin'];
        $type2 = ['type' => 'user'];

        UserType::create($type1);
        UserType::create($type2);
    }
}
