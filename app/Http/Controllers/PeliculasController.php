<?php

namespace App\Http\Controllers;

use App\ClientePelicula;
use App\Peliculas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PeliculasController extends Controller
{
    public function index()
    {
        $peliculas = null;
        if (Input::get('search')) {
            $input = Input::get('search');
            $peliculas = Peliculas::where('nombre', 'LIKE', "%$input%");
        }
        $flag = false;
        $peliculas = Peliculas::all();
        $array = [];
        foreach ($peliculas as $pelicula) {
          array_push($array, (object) array(
            'id' => $pelicula->id,
            'urlCaratula' => config('myconfig.url') . $pelicula->url_caratula,
            'nombre' => $pelicula->nombre,
            'director' => $pelicula->director,
            'genero' => $pelicula->genero,
            'cantidad' => $pelicula->cantidad,
            'descripcion' => $pelicula->descripcion
          ));
        }
        $newCollection = new Collection($array);

        //retornamos la lista de peliculas y la variable flag a la vista
        return view('peliculas.index', ['peliculas' => $newCollection, 'flag' => $flag]);
    }

    public function existencia()
    {
        $peliculas = null;
        $flag = false;
        if (Input::get('search')) {
            $input = Input::get('search');
            $peliculas = Peliculas::where('nombre', 'LIKE', DB::raw("'%$input%'"))->get();
        }else{
            $peliculas = Peliculas::all();
        }
        $array = [];
        foreach ($peliculas as $pelicula) {
          array_push($array, (object) array(
            'id' => $pelicula->id,
            'urlCaratula' => config('myconfig.url')  . $pelicula->url_caratula,
            'nombre' => $pelicula->nombre,
            'director' => $pelicula->director,
            'genero' => $pelicula->genero,
            'cantidad' => $pelicula->cantidad,
            'descripcion' => $pelicula->descripcion
          ));
        }
        $newCollection = new Collection($array);
        $peliculas = $newCollection;
        //retornamos la lista de peliculas y la variable flag a la vista
        return view('peliculas.existencia', ['peliculas' => $peliculas, 'flag' => $flag]);
    }

    public function reservar($id)
    {
        $peliculas = Peliculas::find($id);

        if (isset($peliculas->id)) {
            $pelicula = Peliculas::where('id', $peliculas->id)->first();
            $pelicula->cantidad = (int)$pelicula->cantidad - 1;
            $pelicula->save();

            $clientePelicula = new ClientePelicula();
            $clientePelicula->id_cliente = Auth::user()->id;
            $clientePelicula->id_pelicula = $pelicula->id;
            $clientePelicula->save();
            Session::put('success', 'La Pelicula ' . $pelicula->nombre . ' fue Recervada Correctamente!');
            return redirect()->route('pelicula');
        }
    }

    public function agregarIndex()
    {
        return view('peliculas.add');
    }

    public function agregarPelicula(Request $request)
    {
        $file = $request->file;
        if ($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "png" || $file->getClientOriginalExtension() == "jpeg") {
            $destinationPath = public_path() . '/caratulas';
            $fileData = 'caratulas/' . $file->getclientoriginalname();

            $pelicula = new Peliculas();
            $pelicula->nombre = $request->nombre;
            $pelicula->descripcion = $request->descripcion;
            $pelicula->director = $request->director;
            $pelicula->genero = $request->genero;
            $pelicula->precio = $request->precio;
            $pelicula->cantidad = $request->cantidad;
            $pelicula->url_caratula = $fileData;

            try {
                $pelicula->save();
                $file->move($destinationPath, $file->getclientoriginalname());
                Session::put('success', 'Se ha guardado la pelicula correctamente!');
                return redirect()->route('agregarIndex');
            } catch (\Exception $e) {
                Session::put('error', 'Se Produjo un error al subir la pelicula.');
                return redirect()->route('agregarIndex');
            }
        } else {
            Session::put('error', 'Archivo No Valido, Debe tener la extension .JPG, .JPEG O .PNG ');
            return redirect()->route('agregarIndex');
        }
    }
}
