<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use Illuminate\Http\Request;

/**
 * Class LocalizacionController
 * @package App\Http\Controllers
 */
class LocalizacionController extends Controller
{

    public function index()
    {
        $localizacions = Localizacion::paginate();

        return view('localizacion.index', compact('localizacions'))
            ->with('i', (request()->input('page', 1) - 1) * $localizacions->perPage());
    }


    public function create()
    {
        $localizacion = new Localizacion();
        return view('localizacion.create', compact('localizacion'));
    }


    public function store(Request $request)
    {
        request()->validate(Localizacion::$rules);

        $localizacion = Localizacion::create($request->all());

        return redirect()->route('localizacions.index')
            ->with('success', 'Localizacion created successfully.');
    }


    public function show($id)
    {
        $localizacion = Localizacion::find($id);

        return view('localizacion.show', compact('localizacion'));
    }


    public function edit($id)
    {
        $localizacion = Localizacion::find($id);

        return view('localizacion.edit', compact('localizacion'));
    }


    public function update(Request $request, Localizacion $localizacion)
    {
        request()->validate(Localizacion::$rules);

        $localizacion->update($request->all());

        return redirect()->route('localizacions.index')
            ->with('success', 'Localizacion updated successfully');
    }


    public function destroy($id)
    {
        $localizacion = Localizacion::find($id)->delete();

        return redirect()->route('localizacions.index')
            ->with('success', 'Localizacion deleted successfully');
    }
}
