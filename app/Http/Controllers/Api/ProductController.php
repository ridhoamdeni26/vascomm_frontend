<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $apiCreateProduct = env('BACKEND_API') . '/product/create-product';
        $token = $request->session()->get('user.token');

        $productData  = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => intval($request->price),
        ];

        $reqCreteProduct = Http::withHeaders([
            'Authorization' => $token,
        ])->post($apiCreateProduct, $productData);

        $resultCreateProduct = $reqCreteProduct->json();

        if ($resultCreateProduct['code'] === 400 && isset($resultCreateProduct['message']) && is_array($resultCreateProduct['message'])) {
            $errorMessage = '';
            foreach ($resultCreateProduct['message'] as $error) {
                if (isset($error['message'])) {
                    $errorMessage .= $error['message'] . ' ';
                }
            }

            return redirect()->back()->with('error', $errorMessage);
        }

        if ($resultCreateProduct['code'] === 200) {
            return redirect()->back()->with('message', $resultCreateProduct['message']);
        }
    }

    public function update(Request $request)
    {

        $editId = $request->edit_id;
        $apiUpdateProduct = env('BACKEND_API') . '/product/update-product/' . $editId;
        $token = $request->session()->get('user.token');

        $userData  = [
            'name' => $request->edit_name,
            'price' => intval($request->edit_price),
            'description' => $request->edit_description,
        ];

        $reqUpdateUser = Http::withHeaders([
            'Authorization' => $token,
        ])->put($apiUpdateProduct, $userData);

        $data = $reqUpdateUser->json();

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
