<?php

namespace App\Http\Controllers;

use App\ClientePelicula;
use App\Peliculas;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reservadas = ClientePelicula::where('id_cliente', Auth::user()->id)->get();
        $reservadasTotal = ClientePelicula::all()->count();
        $usuariosTotal = User::all()->count();
        $peliculasTotal = Peliculas::all()->count();
        $cont = null;

        if (Auth::user()->rol == 'admin'){
            $reservadas = ClientePelicula::all();
        }

        $array = [];
        $reservadasCollection = null;

        foreach ($reservadas as $reservada) {
            $id_pelicula = $reservada->id_pelicula;
            $pelicula = Peliculas::where('id', $id_pelicula)->first();
            $cont += (double) $pelicula->precio;

            array_push($array, (object)array(
                'id' => $pelicula->id,
                'nombre' => $pelicula->nombre,
                'director' => $pelicula->director,
                'genero' => $pelicula->genero,
                'precio' => $pelicula->precio,
            ));
        }

        $reservadasCollection = new Collection($array);

        return view('home', [
            'reservadas' => $reservadasCollection,
            'reservadasTotal' => $reservadasTotal,
            'usuariosTotal' => $usuariosTotal,
            'peliculasTotal' => $peliculasTotal,
            'valorTotal' => $cont,
        ]);
    }
}
