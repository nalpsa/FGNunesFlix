<?php

namespace FGNunesFlix\Http\Controllers;

use FGNunesFlix\Repositories\UserRepository;
use Illuminate\Http\Request;
use Jrean\UserVerification\Traits\VerifiesUsers;

class EmailVerificationController extends Controller
{
    use VerifiesUsers;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
    public function redirectAfterVerification()
    {
        $this->loginUser();
        return route('user_settings.edit');
      //  return url('/admin/dashboard');
    }
    protected function loginUser(){
        $email = \Request::get('email');
        $user = $this->repository->findByField('email', $email)->first();
        \Auth::login($user);
    }
}
