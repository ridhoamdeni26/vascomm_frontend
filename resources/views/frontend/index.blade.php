<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />

    <style>
        .owl-carousel {
            position: relative;
        }

        .prevBtn,
        .nextBtn {
            position: absolute;
            top: 125%;
            transform: translateY(-50%);
            z-index: 1;
            cursor: pointer;
            outline: none;
            font-size: 35px;
        }

        .prevBtn {
            left: 0;
        }

        .nextBtn {
            right: 0;
        }
    </style>
</head>

<body class="font-sans">
    <header class="text-white bg-[#FFFFFF] border-b border-gray-700 py-4 sm:flex sm:justify-between sm:items-center">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="assets/imgs/icon/icon.png" alt="Logo" class="object-contain mr-4">
            </div>

            <div class="flex-1 text-center mr-4">
                <div class="relative">
                    <input type="text" class="bg-[#F9F9F9] text-white p-2 rounded-md w-full pl-10 pr-10" placeholder="Cari parfum kesukaanmu">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 10-14 0 7 7 0 0014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex items-center">
                <a href="{{ route('login') }}" class="mr-2 bg-white border border-blue-500 text-blue-500 py-2 px-2 rounded-md">Masuk</a>
                <div class="mr-2"></div>
                <button class="bg-blue-500 text-white py-2 px-2 rounded-md">Daftar</button>
            </div>
        </div>
    </header>

    <div class="container mx-auto mt-8 mb-12 relative">
        <div class="w-full">
            <div class="carousel w-full">
                <div id="item1" class="carousel-item w-full">
                    <img src="assets/imgs/productheader.png" class="w-full" alt="Product Image">
                </div>
                <div id="item2" class="carousel-item w-full">
                    <img src="assets/imgs/productheader.png" class="w-full" alt="Product Image">
                </div>
                <div id="item3" class="carousel-item w-full">
                    <img src="assets/imgs/productheader.png" class="w-full" alt="Product Image">
                </div>
                <div id="item4" class="carousel-item w-full">
                    <img src="assets/imgs/productheader.png" class="w-full" alt="Product Image">
                </div>
            </div>
            <div class="absolute bottom-0 left-0 ml-4 z-10" style="margin-bottom: -2rem;">
                <a href="#item1" class="btn btn-xs">1</a>
                <a href="#item2" class="btn btn-xs">2</a>
                <a href="#item3" class="btn btn-xs">3</a>
                <a href="#item4" class="btn btn-xs">4</a>
            </div>
        </div>
    </div>

    <div class="container size-full mx-auto mt-8 text-left">
        <span class="text-black font-bold text-2xl">Terbaru</span>
    </div>

    <div class="container mx-auto mt-8 mb-12">
        <button class="prevBtn">&lt;</button>
        <div class="owl-carousel grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
            <!-- Produk 1 -->
            <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
                <img src="assets/imgs/product1.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
                <div class="text-left mb-2">
                    <div class="text-black font-semibold">Euodia</div>
                </div>
                <div class="text-left">
                    <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
                </div>
            </div>

            <!-- Produk 2 -->
            <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
                <img src="assets/imgs/product2.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
                <div class="text-left mb-2">
                    <div class="text-black font-semibold">Euodia</div>
                </div>
                <div class="text-left">
                    <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
                </div>
            </div>
        </div>
        <button class="nextBtn">&gt;</button>
    </div>

    <div class="container size-full mx-auto mt-8 text-left">
        <span class="text-black font-bold text-2xl">Produk Tersedia</span>
    </div>


    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-8">

        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
            <img src="assets/imgs/product1.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
            <div class="text-left mb-2">
                <div class="text-black font-semibold">Euodia</div>
            </div>
            <div class="text-left">
                <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
            <img src="assets/imgs/product2.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
            <div class="text-left mb-2">
                <div class="text-black font-semibold">Euodia</div>
            </div>
            <div class="text-left">
                <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2 mb-4">
            <img src="assets/imgs/product2.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
            <div class="text-left mb-2">
                <div class="text-black font-semibold">Euodia</div>
            </div>
            <div class="text-left">
                <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
            <img src="assets/imgs/product2.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
            <div class="text-left mb-2">
                <div class="text-black font-semibold">Euodia</div>
            </div>
            <div class="text-left">
                <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
            <img src="assets/imgs/product2.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
            <div class="text-left mb-2">
                <div class="text-black font-semibold">Euodia</div>
            </div>
            <div class="text-left">
                <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
            <img src="assets/imgs/product2.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
            <div class="text-left mb-2">
                <div class="text-black font-semibold">Euodia</div>
            </div>
            <div class="text-left">
                <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-md shadow-md text-center transition-transform transform hover:shadow-lg hover:scale-105 m-2 mx-2">
            <img src="assets/imgs/product2.png" class="w-full h-40 object-contain mb-4" alt="Product Image">
            <div class="text-left mb-2">
                <div class="text-black font-semibold">Euodia</div>
            </div>
            <div class="text-left">
                <div class="text-gray-500">Rp <span class="text-blue-500">100.000</span></div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-8 mb-8 text-center">
        <button class="btn btn-md border-blue-500 bg-white text-blue-500 hover:bg-blue-500 hover:text-white">
            Lihat Lebih Banyak
        </button>
    </div>

    <footer class="footer p-10 bg-base-200 text-base-content">
        <aside class="mb-4 text-center">
            <img src="assets/imgs/icon/icon.png" alt="Logo" class="object-contain mx-auto mb-4">
            <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing </p>
                <p>elit. Ut commodo in vestibulum, sed dapibus</p>
                <p> tristique nullam.</p>
            </div>

            <!-- Social Media Icons -->
            <div class="flex items-center justify-center mt-4 mx-auto">
                <a href="#" class="mr-4">
                    <img src="assets/imgs/facebook.png" alt="Facebook" class="w-6 h-6">
                </a>
                <a href="#" class="mr-4">
                    <img src="assets/imgs/twitter.png" alt="Twitter" class="w-6 h-6">
                </a>
                <a href="#">
                    <img src="assets/imgs/instagram.png" alt="Instagram" class="w-6 h-6">
                </a>
            </div>
        </aside>


        <nav>
            <header class="footer-title">Layanan</header>
            <a class="link link-hover">BANTUAN</a>
            <a class="link link-hover">TANYA JAWAB</a>
            <a class="link link-hover">HUBUNGI KAMI</a>
            <a class="link link-hover">CARA BERJUALAN</a>
        </nav>
        <nav>
            <header class="footer-title">Tentang Kami</header>
            <a class="link link-hover">ABOUT US</a>
            <a class="link link-hover">KARIR</a>
            <a class="link link-hover">BLOG</a>
            <a class="link link-hover">KEBIJAKAN PRIVASI</a>
            <a class="link link-hover">SYARAT DAN KETENTUAN</a>
        </nav>
        <nav>
            <header class="footer-title">Mitra</header>
            <a class="link link-hover">SUPPLIER</a>
        </nav>
    </footer>


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 5,
                dots: false
            });

            $('.prevBtn').click(function() {
                $('.owl-carousel').trigger('prev.owl.carousel');
            });

            $('.nextBtn').click(function() {
                $('.owl-carousel').trigger('next.owl.carousel');
            });
        });
    </script>
</body>

</html>