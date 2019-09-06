<?php

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
		//delete users table records
		DB::table('users')->delete();
		//insert some dummy records
		DB::table('users')
            ->insert(
                array(
                    array(
                        'id' => '1', 
                        'name' => 'Administrator', 
                        'email' => 'admin@gmail.com', 
                        'password' => '$2y$10$QLUxMlbJP/6y1SRxsisjKOq24.gRxOtBLbejCjD8S7AuNjPy59O.W', 
                        'remember_token' => 'BVUuvIY9w4mKBns6ogNUg01xB7p38tx5IEnLHyyEjHUvGVXpxRv9Myo6GQ4P', 
                        'created_at' => date('Y-m-d h:i:s', strtotime('now')), 
                        'updated_at' => date('Y-m-d h:i:s', strtotime('now')),
                        'status' => '1')
		));
    }
}
