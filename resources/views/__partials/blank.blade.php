@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => 'home', 'name' => 'Home'],
            ['route' => '', 'name' => 'Peticiones Pendientes']
        ],
        'show_add_button' => false,
        'add_button_route' => route('pqr.respuestas')
    ])
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <center><h5>TITLE</h5></center>
                    <br><br>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
