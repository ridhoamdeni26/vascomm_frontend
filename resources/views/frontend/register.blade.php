<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="bg-gray-100 flex justify-between h-screen">
        <div class="hidden md:flex md:w-1/2 relative">
            <img src="assets/imgs/login.png" alt="Login Image" class="absolute w-full h-full object-cover">
        </div>

        <div class="md:w-1/2 p-8 bg-white flex items-center justify-center h-screen">
            <div class="mx-auto max-w-md">
                <h2 class="text-2xl font-semibold mb-4">REGISTRASI ADMIN</h2>
                <p class="text-[#9B9B9B] mb-4 pr-4">Silakan masukkan informasi Anda untuk membuat akun baru</p>
                <form method="POST" action="{{ route('register.user') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nama</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded-md" placeholder="Masukkan nama">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-md" placeholder="Contoh: admin@gmail.com">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border rounded-md" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md" placeholder="Masukkan password">
                    </div>
                    <button type="submit" class="w-full bg-[#41A0E4] text-white py-2 rounded-md hover:bg-blue-600">Daftar</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        window.addEventListener('load', function() {
            @if(Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
            @endif
        });
    </script>
</body>

</html>