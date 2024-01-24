@extends('backend.layout')

@section('content')

<main class="ml-0 sm:ml-64 p-4 mt-16 z-0 h-screen">
    <div class="container mx-auto">
        <div class="flex justify-between mt-8 mb-6">
            <div class="text-left">
                <span class="text-black font-bold text-2xl">Management User</span>
            </div>
            <div>
                <button onclick="my_modal_2.showModal()" class="btn btn-xs sm:btn-sm md:btn-md lg:btn-lg btn-neutral">Tambah User</button>
            </div>
        </div>

        <dialog id="my_modal_2" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box p-6 bg-white rounded-md shadow-lg">
                <h3 class="font-bold text-lg mb-6 text-center">Tambah User</h3>

                <form method="POST" action="{{ route('createuser.admin') }}" class="modal-form">
                    @csrf
                    <div class="mb-6">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nama">
                    </div>

                    <div class="mb-6">
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nomor Telepon">
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Email">
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
                            Nama Lengkap
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No. Telepon
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
                    @if ($user['code'] === 404)
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-blue-500">
                            No data found
                        </td>
                    </tr>
                    @else
                    @foreach ($user['data']['result'] as $data)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $data['username'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data['email'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data['phone'] }}
                        </td>
                        <td class="px-6 py-4">
                            @if($data['user_active'] == true)
                            <div class="badge badge-success text-white">Aktif</div>
                            @else
                            <div class="badge badge-error text-white">Tidak Aktif</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <button onclick="openViewUserModal('{{ $data['username'] }}', '{{ $data['phone'] }}', '{{ $data['email'] }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl"><i class="fas fa-eye"></i></button>

                            <button onclick="openEditUserModal('{{ $data['id'] }}','{{ $data['username'] }}', '{{ $data['phone'] }}', '{{ $data['email'] }}')" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-xl ml-2"><i class="fas fa-pencil-alt"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <dialog id="view_user" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box p-6 bg-white rounded-md shadow-lg">
                <h3 class="font-bold text-lg mb-6 text-center">View Data User</h3>

                <form class="modal-form">
                    <div class="mb-6">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nama" readonly>
                    </div>

                    <div class="mb-6">
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nomor Telepon" readonly>
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Email" readonly>
                    </div>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>

        <dialog id="edit_user" class="modal modal-bottom sm:modal-middle">

            <div class="modal-box p-6 bg-white rounded-md shadow-lg">
                <h3 class="font-bold text-lg mb-6 text-center">Ubah Data User</h3>
                <form class="modal-form" method="POST" action="{{ route('updateuser.admin') }}">
                    @csrf
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="mb-6">
                        <label for="edit_name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="edit_name" name="edit_name" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nama">
                    </div>

                    <div class="mb-6">
                        <label for="edit_phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" id="edit_phone" name="edit_phone" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Nomor Telepon">
                    </div>

                    <div class="mb-6">
                        <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="edit_email" name="edit_email" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan Email">
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>
            <form method="dialog" class="modal-backdrop">
                <button onclick="edit_user.close()">close</button>
            </form>
        </dialog>

        <div class="join">
            @if ($totalPages > 1)
            @for ($i = 1; $i <= $totalPages; $i++) <a href="{{ route('managementuser.admin', ['page' => $i - 1]) }}" class="join-item btn {{ $currentPage == $i ? 'btn-active bg-blue-700 text-white' : 'bg-blue-300 hover:bg-blue-700 focus:bg-blue-800' }}">
                {{ $i }}
                </a>
                @endfor
                @else
                <span class="text-gray-500">No Pagination</span>
                @endif
        </div>
    </div>
</main>

<script>
    function openViewUserModal(name, phone, email) {
        const viewUserModal = document.getElementById('view_user');

        viewUserModal.querySelector('#name').value = name;
        viewUserModal.querySelector('#phone').value = phone;
        viewUserModal.querySelector('#email').value = email;

        viewUserModal.showModal();
    }

    function openEditUserModal(id, name, phone, email) {
        const editUserModal = document.getElementById('edit_user');

        editUserModal.querySelector('#edit_id').value = id;
        editUserModal.querySelector('#edit_name').value = name;
        editUserModal.querySelector('#edit_phone').value = phone;
        editUserModal.querySelector('#edit_email').value = email;

        editUserModal.showModal();
    }
</script>


@endsection