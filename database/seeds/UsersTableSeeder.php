<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user= User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('secret@admin'),
            'admin'=>1
        ]);

        \App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>"uploads/avatar/1.png",
            'about'=>'Walnut can be mixed with shredded bagel, also try mash uping the paste with sweet chili sauce.',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'

        ]);
    }
}
