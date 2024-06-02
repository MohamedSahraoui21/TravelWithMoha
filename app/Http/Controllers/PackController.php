<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show', 'checkout', 'session', 'success']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packs = Pack::orderby('id', 'desc')->paginate(5);
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
            'descripcion' => ['required', 'string', 'min:3', 'unique:packs,descripcion'],
            'disponible' => ['nullable'],
            'precio' => ['required', 'numeric', 'min:0', 'max:9999.99'],
            'imagen' => ['nullable', 'image', 'max:2048'],
        ]);

        Pack::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'disponible' => ($request->disponible) ? "SI" : "NO",
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
        return view('packs.edit', compact('pack'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pack $pack)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:packs,nombre,' . $pack->id],
            'descripcion' => ['required', 'string', 'min:3', 'unique:packs,descripcion,' . $pack->id],
            'disponible' => ['nullable'],
            'precio' => ['required', 'numeric', 'min:0', 'max:9999.99'],
            'imagen' => ['nullable', 'image', 'max:2048'],
        ]);

        $ruta = $pack->imagen;
        if ($request->imagen) {
            if (basename($pack->imagen) != 'default.png') {
                Storage::delete($pack->imagen);
            }
            $ruta = $request->imagen->store('packs');
        }

        $pack->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'disponible' => ($request->disponible) ? "SI" : "NO",
            'precio' => $request->precio,
            'imagen' => $ruta,
        ]);

        return redirect()->route('packs.index')->with('mensaje', 'Pack editado correctamente');
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

    public function checkout()
    {
        $packs = Pack::orderby('id', 'desc')->paginate(5);
        return view('packs.index', compact('packs'));
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $productname = $request->get('productname');
        $totalprice = $request->get('total');
        $total = $totalprice * 100; // Stripe requires amount in cents

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'EUR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Muchas gracias por tu confianza. El pago se ha procesado correctamente. Recibirás un correo con todos los detalles.";
    }
}
