<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function home()
    {
        $response = Http::get('https://api.coincap.io/v2/assets');
        $assets = $response->json();
        $data = [
            'assets' => $assets['data']
        ];
        return view('w_home', $data);
    }

    public function currencies($url='1')
    {
    
        $response = Http::get('https://api.coincap.io/v2/assets');
        $assets = $response->json();
        $data = [
            'page' => $url,
            'assets' => $assets['data']
        ];
        return view('w_currencies', $data);
    }

    public function currencies_page($url='')
    {
        if($url <=0){
            abort(404);
        }elseif($url >=11){
            abort(404);
        }else{
            $response = Http::get('https://api.coincap.io/v2/assets');
            $assets = $response->json();
            $data = [
                'assets' => $assets['data'],
                'page' => $url,
            ];
            return view('w_currencies', $data);
        }
    }

    public function coin($url='')
    {
        $response = Http::get('https://api.coincap.io/v2/assets');
        $assets = $response->json();
        $data = [
            'coin' => $url,
            'assets' => $assets['data']
        ];

        $response = Http::get('https://api.coincap.io/v2/assets');
        $assets = $response->json();

        for($i = 0; $i < count($assets['data']); $i++){
            if($assets['data'][$i]['id']==$url){
                return view('w_coin', $data);
                break;
            }
        }
        abort(404);
    }

    
}