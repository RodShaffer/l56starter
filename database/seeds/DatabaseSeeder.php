<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('roles')->delete();
        DB::table('permissions')->delete();
        $this->call(RolesAndPermissionsSeeder::class);

        DB::table('users')->delete();
        $this->call(UsersTableSeeder::class);

        DB::table('states')->delete();
        $this->call(StatesTableSeeder::class);
    }
}
