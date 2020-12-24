<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	"email"=>"admin@goldoon.ir",
	        "phone"=>"1234567890",
	        "password"=>Hash::make("123456"),
	        "is_admin"=>true,
        ]);
    }
}
