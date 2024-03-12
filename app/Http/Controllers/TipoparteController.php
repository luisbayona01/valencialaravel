<?php

namespace App\Http\Controllers;

use App\Tipoparte;
use Illuminate\Http\Request;

/**
 * Class TipoparteController
 * @package App\Http\Controllers
 */
class TipoparteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipopartes = Tipoparte::paginate();

        return view('tipoparte.index', compact('tipopartes'))
            ->with('i', (request()->input('page', 1) - 1) * $tipopartes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoparte = new Tipoparte();
        return view('tipoparte.create', compact('tipoparte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipoparte::$rules);

        $tipoparte = Tipoparte::create($request->all());

        return redirect()->route('tipopartes.index')
            ->with('success', 'Tipoparte created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoparte = Tipoparte::find($id);

        return view('tipoparte.show', compact('tipoparte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoparte = Tipoparte::find($id);

        return view('tipoparte.edit', compact('tipoparte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipoparte $tipoparte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipoparte $tipoparte)
    {
        request()->validate(Tipoparte::$rules);

        $tipoparte->update($request->all());

        return redirect()->route('tipopartes.index')
            ->with('success', 'Tipoparte updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoparte = Tipoparte::find($id)->delete();

        return redirect()->route('tipopartes.index')
            ->with('success', 'Tipoparte deleted successfully');
    }
}
