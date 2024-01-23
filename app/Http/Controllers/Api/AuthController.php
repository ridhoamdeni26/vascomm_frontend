<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $apiEndpoint = env('BACKEND_API') . '/users/login-admin';

        $response = Http::post($apiEndpoint, [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = $response->json();

        if ($data['code'] === 400 && isset($data['message']) && is_array($data['message'])) {
            $errorMessage = '';
            foreach ($data['message'] as $error) {
                if (isset($error['message'])) {
                    $errorMessage .= $error['message'] . ' ';
                }
            }

            return redirect()->back()->with('error', $errorMessage);
        }

        if ($data['code'] === 200) {
            Session::put('user', $data['data']);
            return redirect()->route('dashhboard.admin')->with('success', 'Selamat datang admin');
        } else {
            return redirect()->back()->with('error', $data['message']);
        }
    }
}
