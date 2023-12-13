<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{




    public function index()
    {
        $users = DB::table('users as U')
                    ->join('roles as R', 'R.id', '=', 'U.idrol')
                    ->select('U.id','U.nombres', 'U.apellidos', 'U.email', 'R.name as rollname')
                    ->get();
        return view('user.index', compact('users'));
                    /* return view('user.index', compact('users'))
                    ->with('i', (request()->input('page', 1) - 1) * $users->perPage())*/;
    }


    public function create()
    {
        $user = new User();
        $roles = Roles::pluck('name', 'id');
        return view('user.create', compact('user','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request

     */

    /**
     * Display the specified resource.
     *
     * @param  int $id

     */
    public function show($id)
    {
        $users = DB::table('users as U')
                            ->join('roles as R', 'R.id', '=', 'U.idrol')
                            ->select('U.id','U.nombres', 'U.apellidos', 'U.email', 'R.name as rollname')
                            ->where('U.id', '=', $id)
                            ->get();


   $user=$users[0];
//dd($user[0]);
         //$roles = Roles::pluck('name', 'id');
     //dd($roles);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id

     */
    public function edit($id)
    {
        $user = User::find($id);
       $roles = Roles::pluck('name', 'id');
        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user

     */
    public function update(Request $request, User $user)
    {
        //request()->validate(User::$rules);

        $user->update($request->all());

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
    public function store(Request $request)
    {

        $password='Etra1234';
        $data = User::where('email', '=', $request->email)->get();
        if (count($data) != 0) {
            $respuesta = "este usuario  ya esta registrado ";

        return redirect()->route('users.index')
            ->with('success', 'Ueste usuario  ya esta registrado');
        } else {
            //dd($datarequest);
            $Usuarios = new User(["nombres" => $request->nombres,
                "apellidos" => $request->apellidos,
                "identificacion" => $request->identificacion,
                "telefono" => $request->telefono,
                "email" => $request->email,
                'password' => bcrypt($password),
                "idrol" => $request->idrol]);

            if ($Usuarios->save()) {

                //$menssage = "Usuario registrado correctamente";

                return redirect()->route('users.index')
            ->with('success', 'Usuario registrado correctamente');

            }
        }

        //return $token;
    }



    public function consultarUser(Request $request)
    {

        $usuarioid = Auth::user()->id;
        //dd($usuarioid);




      $userData= User::select('nombres','apellidos','identificacion',
                                                                    'telefono',
                                                                    'email')->find($usuarioid);
       return  $userData;
    }

}
