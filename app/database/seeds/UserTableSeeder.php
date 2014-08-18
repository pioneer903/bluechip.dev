<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        // !!! All existing users are deleted !!!
        DB::table('users')->delete();

        User::create(array(
            'username'        => 'admin',
            'first_name'      => 'Administrator',
            'password'        => Hash::make('password'),
            'email'           => 'admin@localhost'
        ));
    }
}