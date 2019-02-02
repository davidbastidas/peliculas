@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Agregar Pelicula al catalogo']
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
                    <center><h5>AGREGAR PELICULA AL CATALOGO</h5></center>
                    <br><br>
                    <form id="form" method="post" action="{{route('pelicula.agregar')}}"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-4">
                                <label>Nombre</label>
                                <input name="nombre" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Descripcion</label>
                                <textarea name="descripcion" row="4" class="form-control" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-2">
                                <label>Director</label>
                                <input name="director" class="form-control" required>
                            </div>
                            <div class="col-md-2">
                                <label>Genero</label>
                                <select class="form-control" name="genero">
                                    <option value="Accion">Accion</option>
                                    <option value="Ciencia">Ciencia Ficción</option>
                                    <option value="Drama">Drama</option>
                                    <option value="Documental">Documental</option>
                                    <option value="Romantica">Romantica</option>
                                    <option value="Comedia">Comedia</option>
                                    <option value="Terror">Terror</option>
                                    <option value="Familiar">Familiar</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Precio</label>
                                <input type="number" name="precio" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label>Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <label>Caratula * debe ser en formato imagen.</label>
                                <input type="file" class="form-control" name="file" required>
                            </div>
                        </div>
                        <br>
                        <center>
                            <button class="btn btn-primary btn-fw">Guardar</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
