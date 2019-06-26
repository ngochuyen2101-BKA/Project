<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userSeeder::class);
    }
}

/**
 * 
 */
class userSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->insert([
        	['name'=>'NgocHuyen','email'=>str_random(3).'@gmail.com','password'=>bcrypt('matkhau')],
        	['name'=>'Laravel','email'=>str_random(3).'@gmail.com','password'=>bcrypt('matkhau')],
        	['name'=>'PHP','email'=>str_random(3).'@gmail.com','password'=>bcrypt('matkhau')]

            // 'name'=>'Huyen',
            // 'email'=>'ngochuyen2101@gmail.com',
            // 'password'=>bcrypt('matkhau')
        ]);
	}
}
