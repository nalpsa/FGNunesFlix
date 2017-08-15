<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\FGNunesFlix\Models\User::class,25)
            ->states('admin')
            ->create()->each(function ($user){
                $user->verified = true;
                $user->save();
            });
    }
}
