<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packs = Pack::where('user_id', '=', auth()->user()->id)->orderby('id', 'desc')->paginate(5);
        return view('packs.index', compact('packs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('packs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:packs,nombre'],
            'descripcion' => ['required', 'string', 'min:3', 'unique:packs,nombre'],
            'diponible' => ['nullable'],
            'precio' => ['required', 'decimal:0,2', 'min:0', 'max:9999.99'],
            'imagen' => ['nullable', 'image', 'max:2048'],

        ]);
        Pack::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'disponible' => ($request->disponible) ? "NO" : "SI",
            'precio' => $request->precio,
            'imagen' => ($request->imagen) ? $request->imagen->store('packs') : "default.png",
            'user_id' => auth()->user()->id,

        ]);
        return redirect()->route('packs.index')->with('mensaje', 'Producto Creado Correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Pack $pack)
    {
        return view('packs.show', compact('pack'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pack $pack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pack $pack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pack $pack)
    {
        if (basename($pack->imagen) != 'default.png') {
            Storage::delete($pack->imagen);
        }
        $pack->delete();
        return redirect()->route('packs.index')->with('mensaje', 'Pack Borrado');
    }
}
