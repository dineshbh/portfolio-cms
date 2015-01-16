<?php
 
class UserSeeder extends Seeder {
 
    public function run()
    {
            $user = new User;
            $user->username = "johnmcl81";
            $user->password = Hash::make('l1verp00l');
            $user->save();
    }
}