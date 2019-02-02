@extends('layouts.app')
@section('breadcrumbs')
    @include('__partials.breadcrumbs', [
        'data' => [
            ['route' => '', 'name' => 'Home'],
        ],
        'show_add_button' => false,
        'add_button_route' => route('home')
    ])
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->rol == 'cliente')
        @include('client')
    @else
        @include('admin')
    @endif
@endsection
