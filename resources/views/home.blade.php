@extends('layouts.app')

@section('content')

<div class="container">            
        <title>Champions League</title>        
                <table class="table table-bordered table-striped">  
                    <thead>                  
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Etapa</th>
                            <th scope="col">Partido</th> 
                        </tr>                  
                    </thead>
                    <tbody>
                    @foreach($matches as $match)
                        <tr>
                            <td class="col-md-3">{{date("d-m-Y H:i:s", strtotime($match->fecha))}}</td>
                            <td class="col-md-3">{{$match->etapa}}</td>
                            <td class="col-md-4 align-v">
                                @if($match->equipo_local && $match->equipo_visitante)
                                {{$match->equipo_local}} vs <br> {{$match->equipo_visitante}}
                                @else 
                                    Por definir
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>        
</div>
@endsection
