@extends('backend.layout')

@section('content')
<main class="ml-64 p-4 mt-16 z-0">
    <div class="container size-full mx-auto mt-4 mb-8 text-left">
        <span class="text-black font-bold text-2xl">Dashboard</span>
    </div>

    <div class="grid grid-cols-4 gap-4 mb-4">
        <!-- Card 1 -->
        <div class="card z-0 bg-white p-6 shadow-lg bg-gradient-to-r from-blue-300 to-blue-200">
            <p class="text-left text-md text-[#597393]">Jumlah User</p>
            <p class="text-left text-xl text-[#002060]">Total: 150 User</p>
        </div>
        <!-- Card 2 -->
        <div class="card z-0 bg-white p-6 shadow-lg bg-gradient-to-r from-blue-300 to-blue-200">
            <p class="text-left text-md text-[#597393]">Jumlah User Active</p>
            <p class="text-left text-xl text-[#002060]">Total: 150 User</p>
        </div>
        <!-- Card 3 -->
        <div class="card z-0 bg-white p-6 shadow-lg bg-gradient-to-r from-blue-300 to-blue-200">
            <p class="text-left text-md text-[#597393]">Jumlah Produk</p>
            <p class="text-left text-xl text-[#002060]">Total: 150 Produk</p>
        </div>
        <!-- Card 4 -->
        <div class="card z-0 bg-white p-6 shadow-lg bg-gradient-to-r from-blue-300 to-blue-200">
            <p class="text-left text-md text-[#597393]">Jumlah Produk Active</p>
            <p class="text-left text-xl text-[#002060]">Total: 150 Produk</p>
        </div>
    </div>

    <div class="card bg-white p-6 shadow-lg mb-4">
        <h2 class="text-xl font-semibold mb-4">Produk Terbaru</h2>

        <!-- Tabel Produk -->
        <table class="min-w-full border-0 border-collapse border-gray-200">
            <thead class="rounded-full bg-blue-500 text-white">
                <tr>
                    <th class="py-2 px-4 border-b-0 text-left">Produk</th>
                    <th class="py-2 px-4 border-b-0 text-left">Tanggal Dibuat</th>
                    <th class="py-2 px-4 border-b-0 text-left">Harga</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris 1 -->
                <tr>
                    <td class="py-4 px-4 flex items-center border-t-0">
                        <img src="assets/imgs/laptop.png" alt="Product Icon" class="w-8 h-8 mr-2">
                        Produk A
                    </td>
                    <td class="py-4 px-4 border-t-0">2024-01-23</td>
                    <td class="py-4 px-4 border-t-0">Rp 100,000</td>
                </tr>
                <!-- Baris 2 -->
                <tr>
                    <td class="py-4 px-4 flex items-center border-t-0">
                        <img src="assets/imgs/laptop.png" alt="Product Icon" class="w-8 h-8 mr-2">
                        Produk B
                    </td>
                    <td class="py-4 px-4 border-t-0">2024-01-24</td>
                    <td class="py-4 px-4 border-t-0">Rp 150,000</td>
                </tr>
                <!-- Baris 3 -->
                <tr>
                    <td class="py-4 px-4 flex items-center border-t-0">
                        <img src="assets/imgs/laptop.png" alt="Product Icon" class="w-8 h-8 mr-2">
                        Produk C
                    </td>
                    <td class="py-4 px-4 border-t-0">2024-01-25</td>
                    <td class="py-4 px-4 border-t-0">Rp 120,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

@endsection