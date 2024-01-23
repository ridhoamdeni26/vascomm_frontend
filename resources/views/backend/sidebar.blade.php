<aside id="default-sidebar" class="fixed left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-6 py-8 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium py-1">
            <li>
                <a href="#" class="flex items-center space-x-2 p-2 rounded-lg 
               @if(request()->is('dashboard')) bg-blue-500 text-white @endif hover:bg-blue-500 hover:text-white group">
                    <i class="fas fa-tachometer-alt flex-shrink-0"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
        </ul>

        <ul class="space-y-2 font-medium py-1">
            <li>
                <a href="#" class="flex items-center space-x-2 p-2 rounded-lg 
               @if(request()->is('management.user')) bg-blue-500 text-white @endif hover:bg-blue-500 hover:text-white group">
                    <i class="fas fa-users flex-shrink-0"></i>
                    <span class="ms-3">Management User</span>
                </a>
            </li>
        </ul>

        <ul class="space-y-2 font-medium py-1">
            <li>
                <a href="#" class="flex items-center space-x-2 p-2 rounded-lg 
               @if(request()->is('management.produk')) bg-blue-500 text-white @endif hover:bg-blue-500 hover:text-white group">
                    <i class="fas fa-box flex-shrink-0"></i>
                    <span class="ms-3">Management Produk</span>
                </a>
            </li>
        </ul>
    </div>
</aside>