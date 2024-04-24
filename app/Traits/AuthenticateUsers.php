<?php
namespace App\Traits;

use Illuminate\Foundation\Auth\AuthenticatesUsers as BaseAuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;
trait AuthenticateUsers
{
    use BaseAuthenticatesUsers;

    /**
     * Manejar un intento de inicio de sesión para el usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $data = $request->only('username', 'password');
         $credentials = array_merge($data, ['estado' => 1]);

        if (!Auth::attempt($credentials)) {
           $user = User::where('username', $data['username'])->first();

        if ($user && $user->estado != 1) {
            return response()->json([
                'ok' => false,
                'user' => 'Usuario no activo. Por favor, contacte al administrador.',
            ]);
        }

        return response()->json([
            'ok' => false,
            'user' => 'Error de credenciales',
        ]);
        }

        return response()->json([
            'ok' => true,
            'user' => Auth::user(),
        ]);
    }

  public function Logout(){


          $this->guard()->logout();

    request()->session()->invalidate();

    return redirect('/');


    }

    // Puedes agregar más métodos según tus necesidades
}
