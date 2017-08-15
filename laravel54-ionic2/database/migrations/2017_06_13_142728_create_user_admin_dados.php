<?php


use Illuminate\Database\Migrations\Migration;

class CreateUserAdminDados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $model = \FGNunesFlix\Models\User::create([
            'name' => env('ADMIN_DEFAULT_NAME', 'Administrator'),
            'email' => env('ADMIN_DEFAULT_EMAIL', 'admin@user.com'),
            'password' => bcrypt(env('ADMIN_DEFAULT_PASSWORD', 'secret')),
            'role' => \FGNunesFlix\Models\User::ROLE_ADMIN
        ]);
       $model->verified = true;
       $model->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = \FGNunesFlix\Models\User::where('email','=',env('ADMIN_DEFAULT_EMAIL', 'admin@user.com'))->first();
        if($user instanceof \FGNunesFlix\Models\User){
            $user->delete();
        }
    }
}
