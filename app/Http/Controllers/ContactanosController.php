<?php

namespace App\Http\Controllers;

use App\Mail\Contactanos;
use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function pintarFormulario()
    {
        return view('contactanos.index');
    }
    public function procesarFormulario(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:5'],
            'contenido' => ['required', 'string', 'min:10'],
            'email' => ['required', 'email'],
        ]);
        $email = auth()->user() != null ? auth()->user()->email : $request->email;
        try {
            Mail::to("moha@correo.es")
                ->send(new Contactanos($request->nombre, $request->contenido, $email));
            return redirect()->route('home')->with('mensaje', 'Mensaje enviado');
        } catch (\Exception $ex) {
            return redirect()->route('home')->with('mensaje', 'No se pudo enviar el mensaje!!!');
        }
    }
}
