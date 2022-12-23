<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function memanggilAPI(){
        $token = "2|vI8EuFqpfB0uWpJe3EfsnVi3RrwNfO9Wr46RGCD1";
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token
        ])
        ->get('http://localhost:8000/api/getAllUsersToo');

        $jsonData = $response->json();
        return response()->json($jsonData, $response->getStatusCode());
    }
}
