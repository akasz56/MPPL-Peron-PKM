@props(['id' => 'modal_id'])

<x-buttons.button id="{!! $id . 'Btn' !!}" class="bg-red-500 text-white hover:bg-red-600"
    onclick="openModal('{!! $id !!}')">
    Hapus Lowongan
</x-buttons.button>

<div id="{!! $id !!}"
    class="modal fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            Anda yakin ingin menghapus Lowongan ini?
            <div class="items-center px-4 py-3">
                <x-buttons.button id="ok-btn" class="bg-red-500 text-white hover:bg-red-600">
                    Hapus
                </x-buttons.button>
            </div>
        </div>
    </div>
</div>
