<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Roles;
use Illuminate\Http\Request;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $roles = Roles::select('id', 'name')->paginate(10);

        return view('roles.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Roles();
        return view('roles.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Role::$rules);

        $role = Role::create($request->all());

   //Role::create
        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Roles::find($id);

        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::find($id);

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Roles $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $role)
    {
        //request()->validate(Role::$rules);

        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Perfil editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = Roles::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Perfil eliminado correctamente');
    }
}
