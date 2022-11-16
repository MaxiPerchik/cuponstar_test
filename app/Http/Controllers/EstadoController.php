<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $estados = Estado::all();
        return \view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Estado $estado
     * @return Response
     */
    public function show(Estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Estado $estado
     * @return Application
     */
    public function edit(Estado $estado)
    {
        return \view('estados.edit',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Estado $estado
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Estado $estado): RedirectResponse
    {
        //usamos metodo eloquent
        $estado->update([
            'estado' => $request->input('estado')
        ]);
        return redirect()->route('estados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Estado $estado
     * @return Response
     */
    public function destroy(Estado $estado)
    {
        //
    }
}
