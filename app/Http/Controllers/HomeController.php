<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    function loginView()
    {
        return view('frontend.login');
    }

    public function dashboard() {
        $apiEndpoint = env('BACKEND_API') . '/users/login-admin';

        $response = Http::post($apiEndpoint, [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();


        return view('backend.dashboard');
    }
}
