<?php

namespace App\Http\Controllers;

use App\Estadoparte;
use Illuminate\Http\Request;

/**
 * Class EstadoparteController
 * @package App\Http\Controllers
 */
class EstadoparteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadopartes = Estadoparte::paginate();

        return view('estadoparte.index', compact('estadopartes'))
            ->with('i', (request()->input('page', 1) - 1) * $estadopartes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadoparte = new Estadoparte();
        return view('estadoparte.create', compact('estadoparte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estadoparte::$rules);

        $estadoparte = Estadoparte::create($request->all());

        return redirect()->route('estadopartes.index')
            ->with('success', 'Estadoparte created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoparte = Estadoparte::find($id);

        return view('estadoparte.show', compact('estadoparte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoparte = Estadoparte::find($id);

        return view('estadoparte.edit', compact('estadoparte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estadoparte $estadoparte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estadoparte $estadoparte)
    {
        request()->validate(Estadoparte::$rules);

        $estadoparte->update($request->all());

        return redirect()->route('estadopartes.index')
            ->with('success', 'Estadoparte updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadoparte = Estadoparte::find($id)->delete();

        return redirect()->route('estadopartes.index')
            ->with('success', 'Estadoparte deleted successfully');
    }
}
