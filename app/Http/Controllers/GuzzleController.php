<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use App\User;
class GuzzleController extends Controller
{
    public function homeController() {
        $response = Http::asForm()->post('https://test-api.bussystem.eu/server/curl/get_points.php', [
            'login' => 'ivanmatscko',
            'password' => '1YzWz2aGUxT0',
        ]);
        //var_dump();
        $data = $response->body();
        //$data = json_decode($data);

        $data = simplexml_load_string($data);
        $array = json_decode(json_encode((array) $data), true);
        $array = array($data->getName() => $array);
        $array_asocc = $array["root"]["item"];

        $array_asocc_id_from = $array["root"]["item"][1]['point_id'];
        $array_asocc_id_to = $array["root"]["item"][4]['point_id'];

        return view('welcome', ['cities' =>  $array_asocc]);
    }




    public function getRouteData(Request $citi){

        $id_from = $citi->id_from;
        $id_to = $citi->id_to;
        $response = Http::asForm()->post('https://test-api.bussystem.eu/server/curl/get_routes.php', [
            'login' => 'ivanmatscko',
            'password' => '1YzWz2aGUxT0',
            'id_from' => $id_from,
            'id_to' => $id_to,
            'date' => '2020-08-21',
        ]);
        //var_dump();
        $data = $response->body();
        //$data = json_decode($data);

        $data = simplexml_load_string($data);
        $array = json_decode(json_encode((array) $data), true);
        $array = array($data->getName() => $array);
        $response_array = [];


        if ($array and $array["root"] and isset($array["root"]["item"]) and isset($array["root"]["item"]["route_name"])) {
            $response_array[0] = $array["root"]["item"];
        } else if ($array and $array["root"] and isset($array["root"]["item"]) and !isset($array["root"]["item"]["route_name"])) {
            $response_array = $array["root"]["item"];
        }
        else if ($array and $array["root"] and !isset($array["root"]["item"])) {
            $response_array = $array["root"];
        }
        return view('route', ['routs' =>  $response_array]);
    }



}
