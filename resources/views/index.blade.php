<x-app-layout>
    <x-slot name="header">
        Semua Lowongan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-wrap bg-white border-gray-200">
                    @foreach ($data as $vacancy)
                        <x-cards.vacancy :vacancy="$vacancy" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
