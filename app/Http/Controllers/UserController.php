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
                    ->select('U.id','U.nombres', 'U.apellidos', 'U.codigo', 'U.email','U.username', 'U.password', 'R.name as rollname','U.estado' )
                    ->get();
        return view('user.index', compact('users'));
                    /* return view('user.index', compact('users'))
                    ->with('i', (request()->input('page', 1) - 1) * $users->perPage())*/;
    }

    public function create()
    {
        $user = new User();
        $roles = Roles::pluck('name', 'id');
        $estado = '';
        $codigo = '';
        return view('user.create', compact('user','roles', 'estado', 'codigo'));
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
                            ->select('U.id','U.nombres', 'U.apellidos','U.codigo', 'U.email','U.username','U.password' ,'R.name as rollname', 'U.estado')
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
        $estado = 'readonly';
        $codigo = 'readonly';
        return view('user.edit', compact('user','roles','estado','codigo'));


    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user

     */

     public function  Updatepassword(Request $request){
      //dd();
    User::where('id',$request->input('id'))->update(['password'=> bcrypt($request->input('password'))]);
     return redirect()->back()->with('success', 'Password Editado Correctamente');
    }
    public function update(Request $request, User $user)
    {
        //request()->validate(User::$rules);

    // Check if the password is present in the request
    if ($request->has('password')) {
    // Hash the new password
        $request->merge(['password' => bcrypt($request->input('password'))]);
    }

        $user->update($request->all());
        return redirect()->route('users.index')
            ->with('success', 'Usuario Editado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {    $estado=  DB::table('users')->select('estado')
        ->where('id', '=',$id)->first();

        $valestado=intval($estado->estado);

        if($valestado==0){

       $estadoupd=1;

        }else{

            $estadoupd=0;

        }

        DB::table('users')
        ->where('id', '=',$id)
        ->update(['estado' => $estadoupd]);
        //$user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado del sistema');
    }

    public function store(Request $request)
    {

        //$password='Etra1234';//

         $password = $request->input('password');


        $data = User::where('email', '=', $request->email)->orWhere('username', $request->input('username'))->get();

        if (count($data) != 0) {
            $respuesta = "este usuario  ya esta registrado ";

        return redirect()->route('users.index')
            ->with('success', 'Ueste usuario  ya esta registrado');
        } else {
            //dd($datarequest);
            $Usuarios = new User(["nombres" => $request->nombres,
                "apellidos" => $request->apellidos,
                "codigo" => $request->codigo,
                "identificacion" => $request->identificacion,
                "telefono" => $request->telefono,
                "username"=>$request->username,
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


