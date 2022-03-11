<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactoMail;
use App\Mail\SuscripcionMail;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contacto(Request $request)
    {
        //return $request->all();

        $message = request()->validate([
            'nombre' => 'required',
            'email' => 'required',
            'mensaje' => 'required',
        ]);

        $configuracion = Config::get()->last();

        if ($configuracion) {

            $email = $configuracion->email;

        }else{
            $email = 'eccopac@eccopacmachinery.com';
        }

        Mail::to($email)->send(new ContactoMail($message));

        return ['msj' => 'mensaje enviado', 'success' => true];
    }


    public function suscripcion(Request $request)
    {
        //return $request->all();

        $message = request()->validate([
            'nombre' => 'required',
            'email' => 'required',
            'mensaje' => 'required',
        ]);

        $configuracion = Config::get()->last();

        if ($configuracion) {

            $email = $configuracion->email;

        }else{
            $email = 'eccopac@eccopacmachinery.com';
        }

        Mail::to($email)->send(new SuscripcionMail($message));

        return ['msj' => 'mensaje enviado', 'success' => true];
    }

    
}
