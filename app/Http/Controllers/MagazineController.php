<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$magazines=Magazine::all();  //aqui seleccionamos los datos de la tabla magazines
        $magazines=Magazine::orderBy('ano','desc')->orderBy('mes','desc')->paginate(10);  //aqui seleccionamos los datos de la tabla magazines
        $title ='Listado de Portafolios Estadísticos y Revistas';
        return view('magazines.index',compact('title','magazines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('magazines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => "required|unique:magazines",
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
        Magazine::create($validated);
        echo "Registrado...";
        return  redirect()->route('magazines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Magazine $magazine)
    {
        return view('magazines.show', compact('magazine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magazine $magazine)
    {
        return view('magazines.edit', compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Magazine $magazine)
    {
        //dd($magazine);
        $validated = $request->validate([
            'titulo' => "required|unique:magazines,titulo," . $magazine->id,
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
        $magazine->update($validated);
        echo "Actualizado...";
        return  redirect()->route('magazines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magazine $magazine)
    {
        //
    }
}
