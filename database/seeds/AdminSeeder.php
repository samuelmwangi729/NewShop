<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'First_Name'=>'Samuel',
            'Last_Name'=>'Mwangi',
            'Email'=>'samuelmwangi729@gmail.com',
            'Level'=>'ENqQEFrpaULjyOVpJ2dizIxsDe63kv5CHCkN2vbGQ',
            'Address'=>'100 ol kalou',
            'PhoneNumber'=>'0704922042',
            'Town'=>'Ol Kalou',
            'County'=>'Nyandarua',
            'Password'=>'$2y$10$kNkyLyuqTaqwfd2rlAt4beuUimg8lG26yLzv6QqecyUCBvWDNA12q',
            'Status'=>0,
        ]);
    }
}
