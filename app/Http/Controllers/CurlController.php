<?php

namespace App\Http\Controllers;

class CurlController extends Controller
{

    public function curl($url, $data, $method)
    {
        //Curl es una funcion de php que hace peticiones http

        //iniciamos la funcion
        $curl = curl_init();

        //Usuario y contraseña de la auth de los microservicios
        $username = 'vm-user';
        $password = 'vm12345';

        //Construccion de la cabecera http
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
                'Authorization: Basic ' . base64_encode($username.':'.$password)
            ),
        ));

        //ejecutamos la peticion
        $response = curl_exec($curl);
        $err = curl_error($curl);
        //cerramos la peticion
        curl_close($curl);

        if ($err) {
            //si hay un error se retornara
            return $err;
        } else {
            //retornamos la respuesta del microservicio decodificando el arraylist a un json object
            return (object) json_decode($response);
        }
    }
}
