@extends('layouts.app')

@section('content')
<div class="container">
          <!--<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>-->             
                <table class="table table-bordered table-striped">  
                    <thead>                  
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Etapa</th>
                            <th scope="col">Partido</th> 
                            <th scope="col"> </th>
                        </tr>                  
                    </thead>
                    <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td class="col-md-3">{{$match['utcDate']}}</td>
                            <td class="col-md-3">{{$match['stage']}}</td>
                            <td class="center">
                                @if($match['homeTeam']['name'] && $match['awayTeam']['name'])
                                {{$match['homeTeam']['name']}} vs <br> {{$match['awayTeam']['name']}}
                                @else 
                                    Por definir
                                @endif
                            </td>
                            <td>Ver</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>        
</div>
@endsection
