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
     * @return View
     */
    public function create(): View
    {
       return \view('estados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
       Estado::create([
           'estado'=>$request-> input('estado')
       ]);
       return redirect()->route('estados.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Estado $estado
     * @return View
     */
    public function edit(Estado $estado): View
    {
        return \view('estados.edit',compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Estado $estado
     * @return RedirectResponse
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
     * @param Estado $estado
     * @return RedirectResponse
     */
    public function destroy(Estado $estado): RedirectResponse
    {
       $estado->delete();
      return  redirect()->route('estados.index');
    }
}
