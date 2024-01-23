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

    public function dashboard(Request $request) {
        $apiEndpoint = env('BACKEND_API') . '/users/get-user';
        $token = $request->session()->get('user.token');

        $getParamsUser = [
            'param1' => 'value1',
        ];

        $response = Http::post($apiEndpoint, [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();


        return view('backend.dashboard');
    }
}
