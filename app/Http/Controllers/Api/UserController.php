<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $apiCreateUser = env('BACKEND_API') . '/users/create-user';
        $token = $request->session()->get('user.token');

        $userData  = [
            'username' => $request->name,
            'email' => $request->email,
            'phone' => intval($request->phone),
        ];

        $reqCreteUser = Http::withHeaders([
            'Authorization' => $token,
        ])->post($apiCreateUser, $userData);

        $resultCreateUser = $reqCreteUser->json();

        if ($resultCreateUser['code'] === 400 && isset($resultCreateUser['message']) && is_array($resultCreateUser['message'])) {
            $errorMessage = '';
            foreach ($resultCreateUser['message'] as $error) {
                if (isset($error['message'])) {
                    $errorMessage .= $error['message'] . ' ';
                }
            }

            return redirect()->back()->with('error', $errorMessage);
        }

        if ($resultCreateUser['code'] == 200) {
            return redirect()->back()->with('message', 'Register user successfully');
        } else {
            return redirect()->back()->with('error', 'Register User not Successfully');
        }
    }

    public function update(Request $request)
    {
        $editId = $request->edit_id;
        $apiCreateUser = env('BACKEND_API') . '/users/update-user/' . $editId;
        $token = $request->session()->get('user.token');

        $userData  = [
            'username' => $request->edit_name,
            'email' => $request->edit_email,
            'phone' => intval($request->edit_phone),
        ];

        $reqCreteUser = Http::withHeaders([
            'Authorization' => $token,
        ])->put($apiCreateUser, $userData);

        $data = $reqCreteUser->json();

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
            return redirect()->back()->with('message', $data['message']);
        }
    }
}
