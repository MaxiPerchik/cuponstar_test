<?php

namespace App\Http\Controllers;

use App\Http\Requests\TareasStoreRequest;
use App\Models\Estado;
use App\Models\Tarea;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tareas = Tarea::with('estado')->get();
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $estados = Estado::all();
        return \view('tareas.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TareasStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TareasStoreRequest $request): RedirectResponse
    {
//        $request->validate([
//            'titulo' => 'required',
//            'descripcion' => 'required',
//            'estado_id' => 'required'
//        ]);

        Tarea::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'estado_id' => $request->input('estado_id'),
        ]);
        return redirect()->route('tareas.index');
    }

    public function show($id)
    {
        return Tarea::findOrFail($id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tarea $tarea
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Tarea $tarea)
    {
        $estados = Estado::all();
        return \view('tareas.edit', compact('tarea', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Tarea $tarea
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TareasStoreRequest $request, Tarea $tarea)
    {
        $tarea->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'estado_id' => $request->input('estado_id'),
        ]);
        return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tarea $tarea
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index');
    }
}
