@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Peliculas']
        ],
        'show_add_button' => false,
        'add_button_route' => route('home')
    ])
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <center><h5>CATALOGO DE PELICULAS</h5></center>
                    <br><br>
                    <form action="{{route('existencia')}}">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Escriba la pelicula a buscar</label>
                                <input name="search" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-fw" style="margin-top: 30px">Buscar</button>
                            </div>
                            @if($flag)
                                <div class="col-md-2">
                                    <button class="btn btn-secondary btn-fw" style="margin-top: 30px">Volver</button>
                                </div>
                            @endif
                        </div>
                        <br>
                    </form>
                    <div class="row">
                        @foreach($peliculas as $pelicula)
                            <div class="card" style="width: 20rem; padding-left: 20px; padding-top: 30px">
                                <img class="card-img-top" height="440px" src="{{asset($pelicula->urlCaratula)}}"
                                     alt="Card image cap">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">{{$pelicula->nombre}}</h5>
                                        </div>
                                    </div>
                                    <p class="card-text text-justify">{{$pelicula->descripcion}}</p>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Disponibles</b> <label class="badge badge-success">{{$pelicula->cantidad}}</label></li>
                                        <li class="list-group-item"><b>Director: </b> {{$pelicula->director}}</li>
                                        <li class="list-group-item"><b>Genero: </b> {{$pelicula->genero}}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
