<?php

use Illuminate\Database\Seeder;
use L56S\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'address_one' => '',
            'address_two' => '',
            'city' => '',
            'state' => 'SS',
            'postal_code' => '',
            'phone_number' => '',
            'gravatar' => md5( strtolower( trim( 'admin@domain.com' ) ) ),
            'email' => strtolower( trim('admin@domain.com') ),
            'password' => bcrypt('secret'),
            'verified' => true,
            'email_token' => null,
            'et_created_at' => null
        ]);

        $user->assignRole('admin');

    }
}
