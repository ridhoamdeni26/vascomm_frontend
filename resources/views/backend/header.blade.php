<header class="bg-white shadow-lg fixed mb-16">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <div class="w-auto">
                <a href="#" class="text-gray-800 text-base font-semibold">
                    <img src="assets/imgs/icon/icon.png" alt="">
                </a>
            </div>
            <div class="w-auto">
                <div class="flex items-center space-x-4">
                    <div class="text-left">
                        <h3 class="text-md font-bold">Halo {{ session('user.role') }}</h3>
                        <p class="text-gray-600">{{ session('user.username') }}</p>
                    </div>
                    <div class="dropdown dropdown-end z-10">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                                <img src="https://i.pravatar.cc/300" alt="Profile Pic" class="w-12 h-12 rounded-full cursor-pointer">
                            </div>
                        </div>
                        <div tabindex="0" class="mt-3 z-[10] card card-compact dropdown-content w-52 bg-base-100 shadow">
                            <div class="card-body">
                                <span class="font-bold text-lg">
                                    <a class="justify-between">
                                        <!-- Card Profil -->
                                        <div class="flex flex-col items-center">
                                            <img src="https://i.pravatar.cc/300" alt="Profile Pic" class="w-20 h-20 rounded-full mb-2">
                                            <p class="text-center text-sm font-semibold">{{ session('user.username') }}</p>
                                            <p class="text-center text-xs text-gray-500">{{ session('user.email') }}</p>
                                        </div>
                                    </a>
                                </span>
                                <div class="divide-y divide-blue-200"></div>
                                <div class="flex flex-col items-center mb-6">
                                    <button class="btn btn-sm px-4 py-2 mx-auto text-red-600">
                                        <i class="fa-solid fa-power-off text-red-600"></i>
                                        Keluar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>