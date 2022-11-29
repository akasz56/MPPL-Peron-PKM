@php
    $userIsOwner = $vacancy->author->id == Auth::user()->id;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <div class="flex-1">{{ $vacancy->title }}</div>
            @if ($userIsOwner)
                <div class="flex-none space-x-1">
                    <a href="{!! route('vacancies.edit', $vacancy->id) !!}"
                        class="rounded-md p-2 pl-3 text-sm bg-indigo-500 text-white hover:bg-indigo-600">
                        <i class="fa-solid fa-edit"></i>
                    </a>
                    <button class="rounded-md px-3 py-2 text-sm bg-red-500 text-white hover:bg-red-600"
                        onclick="openModal('deleteModal')">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
            <section>
                <div id="deskripsi">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Deskripsi</h2>
                    <p class="mb-3 font-normal text-gray-700">{{ $vacancy->desc }}</p>
                </div>
                <div id="kriteria">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Kriteria</h2>
                    <p class="mb-3 font-normal text-gray-700">{{ $vacancy->requirement }}</p>
                </div>
            </section>
            <hr>

            @if ($userIsOwner)
                <section class="mt-6">
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Daftar Pengajuan</h2>
                    <div class="flex flex-wrap bg-white border-gray-200">
                        @if ($vacancy->requests->isEmpty())
                            <p class="font-bold text-2xl text-gray-300">Kosong</p>
                        @else
                            @foreach ($vacancy->requests->sortBy('status') as $request)
                                <x-cards.request :request="$request" :renderAs="'creator'" />
                            @endforeach
                        @endif
                    </div>
                </section>
            @else
                <section class="flex items-center mt-4">
                    <a href="{!! route('user.details', $vacancy->author->id) !!}" id="author" class="flex w-max items-center space-x-4">
                        <div class="flex-0">
                            <img class="w-16 h-16 rounded-full" src="{!! $vacancy->author->avatar !!}">
                        </div>
                        <div class="flex-0">
                            <p class="text-sm text-gray-900">{{ $vacancy->author->name }}</p>
                            <p class="text-sm text-gray-500">{{ $vacancy->author->faculty->name }}</p>
                            <p class="text-sm text-gray-500">{{ $vacancy->author->department->name }}</p>
                        </div>
                    </a>
                    @if (Auth::user()->isDeveloper())
                        @if (Auth::user()->hasRequested($vacancy->id))
                            <div class="flex flex-1 justify-end">
                                <span class="mr-3 opacity-75">
                                    Pengajuan terkirim <i class="fa-solid fa-check text-green-600"></i>
                                </span>
                                <a href="{!! route('requests.request-redirect', ['user' => Auth::user()->id, 'vacancy' => $vacancy->id]) !!}"
                                    class="rounded-md px-4 py-2 transition duration-500 ease select-none bg-indigo-500 text-white hover:bg-indigo-600">
                                    Lihat status pengajuan <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                        @else
                            <form method="POST" action="{!! route('requests.create') !!}" class="flex flex-1 justify-end">
                                @csrf
                                <input type="hidden" name="id" value="{!! $vacancy->id !!}">
                                <x-buttons.button class="bg-indigo-500 text-white hover:bg-indigo-600">
                                    Ajukan Bergabung
                                </x-buttons.button>
                            </form>
                        @endif
                    @endif
                </section>
            @endif
        </div>
    </div>

    <div id="deleteModal" class="modal fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                Anda yakin ingin menghapus Lowongan ini?
                <form method="POST" action="{!! route('vacancies.delete', ['id' => $vacancy->id]) !!}" class="items-center px-4 py-3">
                    @csrf
                    <x-buttons.button id="confirmDelete" class="bg-red-500 text-white hover:bg-red-600">
                        Hapus
                    </x-buttons.button>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            function openModal(modal_id) {
                let modal = document.getElementById(modal_id);
                modal.style.display = "block";
            }

            function closeModal(modal_id) {
                let modal = document.getElementById(modal_id);
                modal.style.display = "none";
            }

            let modalClass = document.getElementsByClassName("modal");
            window.onclick = function(event) {
                for (let i = 0; i < modalClass.length; i++) {
                    if (event.target == modalClass[i]) {
                        closeModal(modalClass[i].id);
                        break;
                    }
                };
            }
        </script>
    @endpush
</x-app-layout>
