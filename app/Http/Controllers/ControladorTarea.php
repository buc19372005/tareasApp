<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Validator;

class ControladorTarea extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas=Tarea::all();
        return view('inicio',compact('tareas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('tareas.index')->withErrors($validator);
        }

        Tarea::create([
            'titulo'=>$request->get('titulo')
        ]);

               return redirect()->route('tareas.index')->with('success', 'Agregada con éxito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tarea=Tarea::where('id',$id)->first();
        return view('editar',compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('tareas.edit',['tarea'=>$id])->withErrors($validator);
        }


        $tarea=Tarea::where('id',$id)->first();
        $tarea->titulo=$request->get('titulo');
        $tarea->completada=$request->get('completada');
        $tarea->save();

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Tarea::where('id',$id)->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada.');
    }
}
