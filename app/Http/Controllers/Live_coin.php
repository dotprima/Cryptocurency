<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Live_coin extends Controller
{
    public function index($id)
    {
        $query = '';
        $response = Http::get('https://api.coincap.io/v2/assets');
        $assets = $response->json();
        for($i = 0; $i < count($assets["data"]); $i++){
            $query = $query . ',' . $assets["data"][$i]['id'];
        }
        $query = substr($query, 1);
        $data = [
            'coin' => $id,
            'assets' => $assets['data'],
            'query' => $query,
            'count' => count($assets["data"])
        ];
        return view('Api.coin',$data);
    }
}