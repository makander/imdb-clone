<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    }
}

// DB::table('users')->insert([
//     'firstName' => Str::random(10),
//     'lastName' => Str::random(10),
//     'nickName' => Str::random(10),
//     'email' => Str::random(10).'@gmail.com',
//     'password' => bcrypt('secret'),
//     'role' => Int::random(),
// ]);

// $table->increments('userId')->uniqe();
// $table->string('firstName');
//             $table->string('lastName');
//             $table->string('nickName')->unique();
//             $table->string('email')->unique();
//             $table->timestamp('email_verified_at')->nullable();
//             $table->string('password');
//             $table->int('role');
//             $table->rememberToken();
//             $table->timestamps();