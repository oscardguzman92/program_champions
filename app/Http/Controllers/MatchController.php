<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MatchService;

class MatchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $service_matches = MatchService::getApiMatches(); //Obtener partidos programados consumiendo el api 
        MatchService::saveMatches($service_matches);    //Guardar partidos en base de datos 
        $matches = MatchService::getDBMatches();        //Leer todos los partidos de la base de datos
        return view('home', compact('matches'));
    }
}
