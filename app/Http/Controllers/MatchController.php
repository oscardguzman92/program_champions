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
        $service_matches = MatchService::getApiMatches();
        MatchService::saveMatches($service_matches);
        $matches = MatchService::getDBMatches();

        return view('home', 'matches');
    }
}
