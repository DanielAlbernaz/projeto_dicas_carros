<?php

namespace App\Http\Controllers;

use App\Models\Dica;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->tipo || $request->marca || $request->modelo || $request->versao){

            $query = Dica::query();

            if ($request->tipo) {
                $query->where('dica_tipo_id', '=', $request->tipo);
            }

            if ($request->marca) {
                $query->where('marca', 'LIKE', '%' . $request->marca . '%');
            }

            if ($request->modelo) {
                $query->where('modelo', 'LIKE', '%' . $request->modelo . '%');
            }

            if ($request->versao) {
                $query->where('versao', 'LIKE', '%' . $request->versao . '%');
            }

            $dicas = $query->orderBy('id', 'desc')->paginate(9);
            $parametros = $request->all();

            return view('home', \compact('dicas', 'parametros'));

        }else{
            $dicas = Dica::orderBy('id', 'desc')->paginate(9);

            return view('home', \compact('dicas'));
        }


    }
}
