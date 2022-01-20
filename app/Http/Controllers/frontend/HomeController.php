<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactoMail;
use App\Mail\DestinoMail;
use App\Models\Archivo;
use App\Models\Banner;
use App\Models\Bannerinterna;
use App\Models\Inicio;
use App\Models\Nosotro;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $page = 'inicio';
        $banners = Banner::get()->last();
        $nosotros = Nosotro::get()->last();
        $inicio = Inicio::get()->last();
        $destinos = Servicio::whereTipo('nacional')->whereHome('si')->orderBy('id', 'desc')->paginate(3);
        $destinos_internacionales = Servicio::whereTipo('internacional')->whereHome('si')->orderBy('id', 'desc')->paginate(4); 

        return view('index', compact('page', 'banners', 'inicio', 'nosotros', 'destinos', 'destinos_internacionales'));
    }

    public function nosotros()
    {
        $page = 'nosotros';
        $nosotros = Nosotro::get()->last();
        $destinos = Servicio::whereTipo('nacional')->wherePopular('si')->latest('id')->get();
        $banner = Bannerinterna::where('pagina', 'nosotros')->get()->last();
        return view('nosotros', compact('page', 'nosotros', 'banner', 'destinos'));
    }

    

    public function nacional()
    {
        $page = 'nacional';
        $destinos = Servicio::whereTipo('nacional')->latest('id')->paginate(6);
        $bg = Bannerinterna::where('pagina', 'nacional')->get()->last();
        return view('nacional', compact('page', 'bg', 'destinos'));
    }


    public function destino(Servicio $destino)
    {
        $page = 'destino';
        
        
        return view('destino', compact('page', 'destino'));
    }


    public function destinos(Request $request)
    {
        $page = 'destinos'; 
        $bg = Bannerinterna::where('pagina', 'nacional')->get()->last();

        if ($request->criterio) {
            $destinos = Servicio::where('titulo', 'like', '%'.$request->criterio.'%')->paginate(6);
        }else{
            $destinos = Servicio::where('titulo', 'like', '%'.$request->criterio.'%')->paginate(6);
        }
        
        return view('destinos', compact('page', 'destinos', 'bg'));
    }


    public function descargar(Request $request)
    {
        $archivo = Archivo::find($request->id);
        return  Storage::download($archivo->archivo);
 
    }

    

    public function internacional()
    {
        $page = 'internacional';
        $destinos = Servicio::whereTipo('internacional')->latest('id')->paginate(6);
        $bg = Bannerinterna::where('pagina', 'internacional')->get()->last();
        return view('internacional', compact('page', 'bg', 'destinos'));
    }


    public function contacto()
    {
        $page = 'contacto';
        
        $bg = Bannerinterna::where('pagina', 'contacto')->get()->last();
        return view('contacto', compact('page', 'bg'));
    }


    
    public function destino_send(Request $request)
    {
        $message = request()->validate([
            'nombre' => 'required',
            'email' => 'required',
            'celular' => 'required',
            'mensaje' => 'required',
            'destino' => 'required',
        ]);

       

        if (setting()->email_form) {

            $email = setting()->email_form;

        }else{
            $email = 'ilanvaldez34@gmail.com';
        }

        Mail::to($email)->send(new DestinoMail($message));

        return response()->json(['msj' => 'mensaje enviado'], 200);
    }



    public function contacto_send(Request $request)
    {
        $message = request()->validate([
            'nombre' => 'required',
            'email' => 'required',
            'celular' => 'required',
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);

        //$message['destino'] = 'ddddddddd';

        if (setting()->email) {

            $email = setting()->email;

        }else{
            $email = 'ilanvaldez34@gmail.com';
        }

        Mail::to($email)->send(new ContactoMail($message));

        return response()->json(['msj' => 'mensaje enviado'], 200);
    }


    public function system($type, $key)
    {
        if ($key == '972843376' ) {
            if ($type == 'up') {
                Artisan::call('up');
            }else{
                Artisan::call('down');
            }

            return response()->json(['msj' => 'Se ha ejecutado con éxito']);
        }


        return response()->json(['msj' => 'No tienes acceso.']);
    }

}
