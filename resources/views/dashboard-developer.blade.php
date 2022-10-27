<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

            <section id="vacancies" class="mb-12">
                <div class="mb-4 border-b">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">
                        Pengajuan Saya
                    </h5>
                </div>
                <div class="flex flex-wrap justify-around bg-white border-gray-200">
                    @if ($requests->isEmpty())
                        <p class="my-16 font-bold text-2xl text-gray-300">Kosong</p>
                    @else
                        @foreach ($requests as $item)
                            <a href="{{ route('vacancies.details', $item->vacancy->id) }}"
                                class="p-6 mb-4 w-96 bg-white rounded-lg border border-gray-300 hover:bg-gray-100">
                                <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $item->vacancy->title }}</h5>
                                <p class="mb-3 font-normal text-gray-700">{!! Str::limit($item->vacancy->desc, 150) !!}</p>
                            </a>
                        @endforeach
                    @endif
                </div>
            </section>

            <section id="vacancies" class="mb-12">
                <div class="mb-4 border-b">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">
                        Pengajuan Diterima
                    </h5>
                </div>
                <div class="flex flex-wrap justify-around bg-white border-gray-200">
                    @if ($accepted_requests->isEmpty())
                        <p class="my-16 font-bold text-2xl text-gray-300">Kosong</p>
                    @else
                        @foreach ($accepted_requests as $item)
                            <a href="{{ route('vacancies.details', $item->vacancy->id) }}"
                                class="p-6 mb-4 w-96 bg-white rounded-lg border border-gray-300 hover:bg-gray-100">
                                <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $item->vacancy->title }}</h5>
                                <p class="mb-3 font-normal text-gray-700">{!! Str::limit($item->vacancy->desc, 150) !!}</p>
                            </a>
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </div>

</x-app-layout>
