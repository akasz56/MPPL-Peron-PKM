<x-app-layout>
    <x-slot name="header">
        Semua Lowongan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-2 bg-white border-gray-200">
                    @foreach ($data as $item)
                        <x-cards.vacancy :vacancy="$item" />
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
