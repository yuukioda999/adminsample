<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class,10)->create();
        // for($i=0; $i<10 ; $i++){
		// 	DB::table('users')->insert([
		// 		'name' => 'User-' . $i,
        //         'email' => 'user-'.$i.'@example.com',
        //         'password' => bcrypt('password-' . $i),
        //         'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
                
		// 	]);
		// }
    }
}
