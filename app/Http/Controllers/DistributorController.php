<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DistributorController extends Controller
{
   public function index()
   {
        $data['title'] = 'Kelola Distributor';

            $token = session('access_token');
            // $response3 = Http::withToken("$token")->get('http://127.0.0.1:8000/api/users');
            // $response2 = Http::withToken("$token")->get('http://127.0.0.1:8000/api/count_manager');
            // $response1 = Http::withToken("$token")->get('http://127.0.0.1:8000/api/penjab');
            $response = Http::withToken("$token")->get('https://127.0.0.1:8000/api/distributor');
            $body = $response->getBody();
            // $body3 = $response3->getBody();
            // $body2 = $response2->getBody();
            // $body1 = $response1->getBody();
            // $data3['users'] = json_decode($body3, true);
            // $data3['users'] = $data3['users']['data'];
            // $data2['count_manager'] = json_decode($body2, true);
            // $data2['count_manager'] = $data2['count_manager']['data'];
            // $data1['penjab'] = json_decode($body1, true);
            // $data1['penjab'] = $data1['penjab']['data'];
            $data['distributor'] = json_decode($body, true);
            $data['distributor'] = $data['distributor']['data'];

            return view('backend.distributor.index', $data);
   }
}
