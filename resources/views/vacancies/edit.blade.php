<x-app-layout>
    <x-slot name="header">
        Edit Lowongan
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('vacancies.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{!! $vacancy->id !!}">
                        <div class="mb-6">
                            <x-forms.label for="title">Judul</x-forms.label>
                            <x-forms.text id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="$vacancy->title" placeholder="Masukkan Judul anda" required autofocus />
                        </div>
                        <div class="mb-6">
                            <x-forms.label for="desc">Deskripsi</x-forms.label>
                            <x-forms.textarea id="desc" class="block mt-1 w-full" name="desc" :value="$vacancy->desc"
                                placeholder="Masukkan Deskripsi anda" required />
                        </div>
                        <div class="mb-6">
                            <x-forms.label for="requirement">Kriteria</x-forms.label>
                            <x-forms.textarea id="requirement" class="block mt-1 w-full" name="requirement"
                                :value="$vacancy->requirement" placeholder="Masukkan Kriteria anda" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                Submit
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
