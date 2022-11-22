<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
            <section id="accRequests" class="mb-12">
                <div class="mb-4 border-b">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">
                        Pengajuan Diterima
                    </h5>
                </div>
                <div class="flex flex-wrap bg-white border-gray-200">
                    @if ($accepted_requests->isEmpty())
                        <p class="py-16 w-full font-bold text-2xl text-center text-gray-300">Kosong</p>
                    @else
                        @foreach ($accepted_requests as $request)
                            <x-cards.request :request="$request" />
                        @endforeach
                    @endif
                </div>
            </section>

            <section id="myRequests" class="mb-12">
                <div class="mb-4 border-b">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">
                        Pengajuan Saya
                    </h5>
                </div>
                <div class="flex flex-wrap bg-white border-gray-200">
                    @if ($requests->isEmpty())
                        <p class="py-16 w-full font-bold text-2xl text-center text-gray-300">Kosong</p>
                    @else
                        @foreach ($requests as $request)
                            <x-cards.request :request="$request" />
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </div>

</x-app-layout>
