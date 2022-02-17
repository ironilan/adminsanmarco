<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    public function config(Request $request)
    {
        
        $config = Config::wherePage($request->page)->select('*',
                DB::raw("CONCAT('".config('app.url')."/storage/', logo) as logo"),
                DB::raw("CONCAT('".config('app.url')."/storage/', logo_footer) as logo_footer"),
            )->first();

        

        return response()->json($config,200);
    }
}
