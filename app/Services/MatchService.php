<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use App\Models\Match;

/**
 * Class MatchService.
 */
class MatchService
{
    public function getApiMatches() { 
        $service = HTTP::withHeaders(['X-Auth-Token' => 'f7e576dc79ee4767a5a943ff7bd25fde'])
            ->get('https://api.football-data.org/v2/competitions/CL/matches?status=SCHEDULED')
            ->json();

        $matches = $service['matches'];
        return $matches;  
    }

    public function saveMatches($matches) {
        
        $matches_ids = Match()::lists('api_id');

        foreach($matches as $match) {
            if(!in_array($match['id'], $matches_ids)) {
                $new_match = new Match();
                $new_match->api_id = $match['id'];
                $new_match->fecha = $match['utcDate'];
                $new_match->etapa = $match['stage'];
                $new_match->equipo_local = $match['homeTeam']['name'];
                $new_match->equipo_visitante = $match['awayTeam']['name'];
                //$new_match->save();
                dump($new_match);
            }
        }
    }

    public function getDBMatches() { 
        $matches = Match::get();
        return $matches;
    }
}
