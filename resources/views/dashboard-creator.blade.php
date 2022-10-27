<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

            <section id="vacancies" class="mb-12">
                <div class="mb-4 border-b">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">
                        Lowongan Saya
                    </h5>
                </div>
                <div class="grid grid-cols-3 gap-2 bg-white border-gray-200">
                    <a href="{{ route('vacancies.create') }}"
                        class="flex flex-col p-6 mb-4 w-96 bg-white rounded-lg border border-gray-300 hover:bg-gray-100">
                        <i class="m-auto fa-solid fa-plus fa-10x text-indigo-400"></i>
                        <span class="m-auto text-2xl font-bold text-indigo-400">Buat Lowongan</span>
                    </a>
                    @foreach ($vacancies as $vacancy)
                        <x-cards.vacancy :vacancy="$vacancy" />
                    @endforeach
                </div>
            </section>

            <section id="requests" class="mb-12">
                <div class="mb-4 border-b">
                    <h5 class="mb-2 text-2xl font-bold text-gray-900">
                        Pengajuan bergabung
                    </h5>
                </div>
                <div class="">
                    asdasdqweqwe
                </div>
            </section>
        </div>
    </div>

</x-app-layout>
