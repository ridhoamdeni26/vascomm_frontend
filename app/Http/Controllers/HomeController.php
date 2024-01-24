<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function index()
    {
        $apiGetProduct = env('BACKEND_API') . '/product/get-product-user';

        $getParamsTotalProduct = [
            'isActive' => "true",
        ];

        $resTotalProductActive = Http::get($apiGetProduct, $getParamsTotalProduct);

        $resultTotalProductActive = $resTotalProductActive->json();

        $data = [
            'product' => $resultTotalProductActive,
        ];

        return view('frontend.index')->with($data);
    }

    function loginView()
    {
        return view('frontend.login');
    }

    function registerView()
    {
        return view('frontend.register');
    }

    public function dashboard(Request $request)
    {
        $apiGetUser = env('BACKEND_API') . '/users/get-user';
        $apiGetProduct = env('BACKEND_API') . '/product/get-product';
        $token = $request->session()->get('user.token');

        // * Get Total User
        $reqTotalUser = Http::withHeaders([
            'Authorization' => $token,
        ])->get($apiGetUser);

        $resultTotalUser = $reqTotalUser->json();
        $totalUser = '';
        if ($resultTotalUser['code'] === 200) {
            $totalUser = $resultTotalUser['data']['totalUser'];
        } else {
            $totalUser = 0;
        }

        // * Get Total Acitve User
        $getParamsTotalUser = [
            'isActive' => "true",
        ];

        $resTotalUserActive = Http::withHeaders([
            'Authorization' => $token,
        ])->get($apiGetUser, $getParamsTotalUser);

        $resultTotalUserActive = $resTotalUserActive->json();
        $totalUserActive = '';
        if ($resultTotalUserActive['code'] === 200) {
            $totalUserActive = $resultTotalUserActive['data']['totalUser'];
        } else {
            $totalUserActive = 0;
        }

        // * Get Data Product
        $reqTotalProduct = Http::withHeaders([
            'Authorization' => $token,
        ])->get($apiGetProduct);

        $resultTotalProduct = $reqTotalProduct->json();
        $totalProduct = '';
        if ($resultTotalProduct['code'] === 200) {
            $totalProduct = $resultTotalProduct['data']['totalProduct'];
        } else {
            $totalProduct = 0;
        }

        // * Get Data Product Active
        $getParamsTotalProduct = [
            'isActive' => "true",
        ];

        $resTotalProductActive = Http::withHeaders([
            'Authorization' => $token,
        ])->get($apiGetProduct, $getParamsTotalProduct);

        $resultTotalProductActive = $resTotalProductActive->json();
        $totalProductActive = '';
        if ($resultTotalProduct['code'] === 200) {
            $totalProductActive = $resultTotalProductActive['data']['totalProduct'];
        } else {
            $totalProductActive = 0;
        }

        $dataProductActive = $resultTotalProductActive['data']['result'];

        $data = [
            'total_user' => $totalUser,
            'total_user_active' => $totalUserActive,
            'total_product' => $totalProduct,
            'total_product_active' => $totalProductActive,
            'data_product_active' => $dataProductActive
        ];

        return view('backend.dashboard')->with($data);
    }

    public function managementUser(Request $request, $page = 0, $limit = 10)
    {
        $apiGetUser = env('BACKEND_API') . '/users/get-user';
        $token = $request->session()->get('user.token');

        // * Get Data User
        $resDataUser = Http::withHeaders([
            'Authorization' => $token,
        ])->get($apiGetUser, [
            'page' => $page,
            'limit' => $limit,
        ]);

        $resultDataUser = $resDataUser->json();

        $data = [
            'user' => $resultDataUser,
            'currentPage' => $page + 1,
            'totalPages' => $resultDataProduct['data']['totalPage'] ?? 1,
        ];

        return view('backend.managementuser')->with($data);
    }

    public function managementProduct(Request $request, $page = 0, $limit = 10)
    {
        $apiGetProduct = env('BACKEND_API') . '/product/get-product';
        $token = $request->session()->get('user.token');

        $resDataProduct = Http::withHeaders([
            'Authorization' => $token,
        ])->get($apiGetProduct, [
            'page' => $page,
            'limit' => $limit,
        ]);

        $resultDataProduct = $resDataProduct->json();

        $data = [
            'product' => $resultDataProduct,
            'currentPage' => $page + 1,
            'totalPages' => $resultDataProduct['data']['totalPage'] ?? 1,
        ];


        return view('backend.managementproduct')->with($data);
    }
}
