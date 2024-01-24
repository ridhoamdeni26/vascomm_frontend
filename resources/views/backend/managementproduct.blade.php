@extends('backend.layout')

@section('content')

<main class="ml-0 sm:ml-64 p-4 mt-16 z-0 h-screen">
    <div class="container mx-auto">
        <div class="flex justify-between mt-8 mb-6">
            <div class="text-left">
                <span class="text-black font-bold text-2xl">Management Produk</span>
            </div>
            <div>
                <button onclick="my_modal_2.showModal()" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg btn-neutral">Tambah Produk</button>
            </div>
        </div>

        <dialog id="my_modal_2" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box p-6 bg-white rounded-md shadow-lg">
                <h3 class="font-bold text-lg mb-6 text-center">Tambah Produk</h3>

                <form method="POST" action="{{ route('createproduct.admin') }}" class="modal-form">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nama Produk">
                    </div>

                    <div class="mb-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                        <input type="text" id="price" name="price" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Harga Produk">
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                        <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Deskripsi Produk"></textarea>
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <div class="overflow-x-auto shadow-md sm:rounded-lg mt-4 mb-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Dibuat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($product['code'] === 404)
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-blue-500">
                            No data found
                        </td>
                    </tr>
                    @else
                    @foreach ($product['data']['result'] as $data)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data['name'] }}
                        </th>
                        <td class="px-6 py-4">Rp.
                            {{ $data['price'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($data['created_at'])->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($data['product_active'] == true)
                            <div class="badge badge-success text-white">Aktif</div>
                            @else
                            <div class="badge badge-error text-white">Tidak Aktif</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openViewProductModal('{{ $data['name'] }}', '{{ $data['price'] }}', '{{ $data['description'] }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl"><i class="fas fa-eye"></i></button>

                            <button onclick="openEditProductModal('{{ $data['id'] }}','{{ $data['name'] }}', '{{ $data['price'] }}', '{{ $data['description'] }}')" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-xl ml-2"><i class="fas fa-pencil-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <div class="join">
            @if ($totalPages > 1)
            @for ($i = 1; $i <= $totalPages; $i++) <a href="{{ route('managementproduct.admin', ['page' => $i - 1]) }}" class="join-item btn {{ $currentPage == $i ? 'btn-active bg-blue-700 text-white' : 'bg-blue-300 hover:bg-blue-700 focus:bg-blue-800' }}">
                {{ $i }}
                </a>
                @endfor
                @else
                <span class="text-gray-500">No Pagination</span>
                @endif
        </div>

        <!-- View Modal -->
        <dialog id="view_produk" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box p-6 bg-white rounded-md shadow-lg">
                <h3 class="font-bold text-lg mb-6 text-center">View Data User</h3>

                <form class="modal-form">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" id="name_view" name="name_view" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nama Produk" readonly>
                    </div>

                    <div class="mb-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                        <input type="text" id="price_view" name="price_view" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Harga Produk" readonly>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                        <textarea id="description_view" name="description_view" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Deskripsi Produk" readonly></textarea>
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <!-- Modal Edit Produk -->
        <dialog id="edit_produk" class="modal modal-bottom sm:modal-middle">

            <div class="modal-box p-6 bg-white rounded-md shadow-lg">
                <h3 class="font-bold text-lg mb-6 text-center">Ubah Data User</h3>
                <form class="modal-form" method="POST" action="{{ route('updateproduct.admin') }}">
                    @csrf
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                        <input type="text" id="edit_name" name="edit_name" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nama Produk">
                    </div>

                    <div class="mb-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga Produk</label>
                        <input type="text" id="edit_price" name="edit_price" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Harga Produk">
                    </div>

                    <div class="mb-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                        <textarea id="edit_description" name="edit_description" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Deskripsi Produk"></textarea>
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button onclick="edit_produk.close()">close</button>
            </form>
        </dialog>
    </div>
</main>

<script>
    function openViewProductModal(name, price, description) {
        const viewProductModal = document.getElementById('view_produk');

        viewProductModal.querySelector('#name_view').value = name;
        viewProductModal.querySelector('#price_view').value = price;
        viewProductModal.querySelector('#description_view').value = description;

        viewProductModal.showModal();
    }

    function openEditProductModal(id, name, price, description) {
        const editProductModal = document.getElementById('edit_produk');

        editProductModal.querySelector('#edit_id').value = id;
        editProductModal.querySelector('#edit_name').value = name;
        editProductModal.querySelector('#edit_price').value = price;
        editProductModal.querySelector('#edit_description').value = description;

        editProductModal.showModal();
    }
</script>

@endsection