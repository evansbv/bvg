<?php

namespace App\Http\Controllers;

use App\Models\Bulletine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BulletineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            //$bulletines=Bulletine::all();  //aqui seleccionamos los datos de la tabla magazines
            $bulletines=Bulletine::withTrashed()->orderBy('ano','desc')->orderBy('mes','desc')->paginate(10);  //aqui seleccionamos los datos de la tabla magazines
            $title ='Listado de Boletines';
            return view('bulletines.index',compact('title','bulletines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ='Nuevo Boletin';
        return view('bulletines.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => "required|unique:bulletines",
            'descripcion' => "required",
            'ano' => "required",
            'mes' => "required",
            'url' => "required",
            'image' => "required"
        ]);
        $validated['user_id'] = Auth::id();
        //dd(Auth::id());
        //dd($validated);
        $filename = time().".".$request["image"]->extension();
        $validated['image'] = $filename;
        //dd($filename);
        $request["image"]->move(public_path("images"),$filename);
        Bulletine::create($validated);
        echo "Registrado...";
        return  redirect()->route('bulletines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bulletine $bulletine)
    {
        return view('bulletines.show', compact('bulletine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bulletine $bulletine)
    {
        $title ='Editar Boletin';
        return view('bulletines.edit', compact('title','bulletine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bulletine $bulletine)
    {
        //dd($magazine);
        $validated = $request->validate([
            'titulo' => "required|unique:bulletines,titulo," . $bulletine->id,
            'descripcion' => "required",
            'ano' => "required",
            'mes' => "required",
            'url' => "required",
            'image' => "required"
        ]);
        $validated['user_id'] = Auth::id();
        //dd(Auth::id());
        //dd($validated);
        $filename = time().".".$request["image"]->extension();
        $validated['image'] = $filename;
        //dd($filename);
        $request["image"]->move(public_path("images"),$filename);
        $bulletine->update($validated);
        echo "Actualizado...";
        return  redirect()->route('bulletines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bulletine $bulletine)
    {
        $bulletine->delete();
        return  redirect()->route('bulletines.index');
    }
    public function restore($id)
    {
        //dd($id);
        $bulletine=Bulletine::withTrashed()->find($id);
        //dd($magazine);
        $bulletine->restore(); // This restores the soft-deleted post
        return  redirect()->route('bulletines.index');
    }
}
