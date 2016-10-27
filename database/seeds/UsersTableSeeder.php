// app/database/seeds/UserTableSeeder.php

<?php

class UserTableSeeder extends Seeder
{

public function run()
{
    //DB::table('users')->delete();
    User::create(array(
       
        'username' => 'root',
        'email'    => 'root@root.com',
        'password' => Hash::make('root'),
    ));
}

}