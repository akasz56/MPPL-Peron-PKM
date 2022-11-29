@php
    $isCurrentUser = $data->id == Auth::user()->id;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <div class="flex-1">User Profile ({{ $data->name }})</div>
            @if ($isCurrentUser)
                <div class="flex-none space-x-1">
                    <a href="{{ route('user.edit') }}"
                        class="rounded-md p-2 pl-3 text-sm bg-indigo-500 text-white hover:bg-indigo-600">
                        <i class="fa-solid fa-edit"></i>
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

            <div class="w-full">
                <img class="m-auto w-32 h-32 rounded-full" src="{!! $data->avatar !!}" />
                <p class="text-center font-bold">{{ ucwords($data->role) }}</p>
                <p class="text-center">{{ strtoupper($data->NIM) }}</p>
            </div>
            <div class="flex items-center space-x-4 mb-3">
                <div class="flex-1">
                    <div class="mb-3">
                        <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">Nama</h2>
                        <p class="text-center font-normal text-gray-700">{{ $data->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">E-mail</h2>
                        <p class="text-center font-normal text-gray-700">{{ $data->email }}</p>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="mb-3">
                        <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">Fakultas</h2>
                        <p class="text-center font-normal text-gray-700">{{ $data->faculty->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h2 class="text-center text-2xl font-bold tracking-tight text-gray-900">Departemen</h2>
                        <p class="text-center font-normal text-gray-700">{{ $data->department->name }}</p>
                    </div>
                </div>
            </div>

            @if ($data->isCreator())
                <section id="vacancies" class="my-12">
                    <div class="mb-4 border-b">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">
                            Lowongan dari {{ $data->name }}
                        </h5>
                    </div>
                    <div class="flex flex-wrap bg-white border-gray-200">
                        @if ($data->vacancies->isEmpty())
                            <p class="py-16 w-full font-bold text-2xl text-center text-gray-300">Kosong</p>
                        @else
                            @foreach ($data->vacancies as $vacancy)
                                <x-cards.vacancy :vacancy="$vacancy" />
                            @endforeach
                        @endif
                    </div>
                </section>
            @elseif ($data->isDeveloper())
                <section id="memberOf" class="my-12">
                    <div class="mb-4 border-b">
                        <h5 class="mb-2 text-2xl font-bold text-gray-900">
                            Anggota dari
                        </h5>
                    </div>
                    <div class="flex flex-wrap bg-white border-gray-200">
                        @if ($data->requests->isEmpty())
                            <p class="py-16 w-full font-bold text-2xl text-center text-gray-300">Kosong</p>
                        @else
                            @foreach ($data->acceptedRequests() as $request)
                                <x-cards.vacancy :vacancy="$request->vacancy" />
                            @endforeach
                        @endif
                    </div>
                </section>
            @endif

        </div>
    </div>
</x-app-layout>
