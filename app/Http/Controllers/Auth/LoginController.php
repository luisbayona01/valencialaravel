<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Traits\AuthenticateUsers;

class LoginController extends Controller
{


    use AuthenticateUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function showLoginForm()
    {
        return view('auth.login');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */








}
