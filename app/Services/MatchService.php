<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

/**
 * Class MatchService.
 */
class MatchService
{
    public function getMatches() { 
        $matches = HTTP::withHeaders(['X-Auth-Token' => 'f7e576dc79ee4767a5a943ff7bd25fde'])
            ->get('https://api.football-data.org/v2/competitions/CL/matches?status=SCHEDULED')
            ->json();

        return $matches['matches'];  
    }
}
