<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactoMail;
use App\Mail\CotizarMail;
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
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);

        $configuracion = Config::get()->last();

        if ($configuracion) {

            $email = $configuracion->email;

        }else{
            $email = 'servicios@msgsac.com.pe';
        }

        Mail::to($email)->send(new ContactoMail($message));

        return ['msj' => 'mensaje enviado', 'success' => true];
    }

    public function cotizar(Request $request)
    {
    	$message = request()->validate([
            'nombre' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'ruc' => 'required|numeric|min:1000000000|max:99999999999',
            'mensaje' => 'required|string|max:255',
        ]);

        $configuracion = Config::get()->last();
        if ($configuracion) {
            $email = $configuracion->email;
        }else{
            $email = 'servicios@msgsac.com.pe';
        }

        Mail::to($email)->send(new CotizarMail($message));

        return ['msj' => 'mensaje enviado', 'success' => true];
    }
}
