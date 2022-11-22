<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">

            @if ($data->status == App\Helpers\Variables::REQUEST_STATUS_ACCEPTED)
                <section id="status" class="py-5 mb-5 bg-green-400 rounded-md">
                    <h1 class="text-center font-bold text-4xl text-white">Diterima</h1>
                </section>
            @elseif ($data->status == App\Helpers\Variables::REQUEST_STATUS_REJECTED)
                <section id="status" class="py-5 mb-5 bg-red-400 rounded-md">
                    <h1 class="text-center font-bold text-4xl text-white">Dtolak</h1>
                </section>
            @else
                <section id="status" class="py-5 mb-5 bg-yellow-400 rounded-md">
                    <h1 class="text-center font-bold text-4xl text-white">Menunggu</h1>
                </section>
            @endif

            <section id="overview">
                <div class="mb-3">
                    <h4 class="font-bold text-gray-900">Pengajuan pada</h4>
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{ $data->vacancy->title }}</h2>
                </div>
                <div class="mb-3">
                    <p class="text-gray-700">{{ $data->vacancy->desc }}</p>
                </div>
            </section>
            @if (Auth::user()->isCreator())
                <section id="requester" class="my-4">
                    <h4 class="font-bold text-gray-900">Diajukan oleh</h4>
                    <div class="flex items-center">
                        <a href="{!! route('user.details', $data->author->id) !!}" id="author" class="flex w-max items-center space-x-4">
                            <div class="flex-0">
                                <img class="w-16 h-16 rounded-full" src="{!! $data->author->avatar !!}">
                            </div>
                            <div class="flex-0">
                                <p class="text-sm text-gray-900">{{ $data->author->name }}</p>
                                <p class="text-sm text-gray-500">{{ $data->author->faculty->name }}</p>
                                <p class="text-sm text-gray-500">{{ $data->author->department->name }}</p>
                            </div>
                        </a>
                    </div>
                </section>
            @endif
            <hr>
            <section id="learn-more" class="flex items-center mt-4">
                <div class="flex-1">
                    <a href="{!! route('vacancies.details', $data->vacancy->id) !!}"
                        class="rounded-md px-4 py-2 transition duration-500 ease select-none bg-indigo-500 text-white hover:bg-indigo-600">
                        Informasi lebih lanjut <i class="fa-solid fa-angle-right"></i>
                    </a>
                </div>
                @if ($data->status == 1)
                    @if (Auth::user()->isDeveloper())
                        <form method="POST" action="{!! route('requests.delete', $data->id) !!}" class="flex justify-end">
                            @csrf
                            <input type="hidden" name="id" value="{!! $data->vacancy->id !!}">
                            <x-buttons.button class="bg-red-500 text-white hover:bg-red-600">
                                Batalkan pengajuan
                            </x-buttons.button>
                        </form>
                    @else
                        <form method="POST" action="{!! route('requests.update') !!}" class="flex justify-end space-x-2">
                            @csrf
                            <input type="hidden" name="id" value="{!! $data->id !!}">
                            <x-buttons.button name="status" value="3"
                                class="bg-red-500 text-white hover:bg-red-600">
                                Tolak pengajuan
                            </x-buttons.button>
                            <x-buttons.button name="status" value="2"
                                class="bg-green-500 text-white hover:bg-green-600">
                                Terima pengajuan
                            </x-buttons.button>
                        </form>
                    @endif
                @endif
            </section>
        </div>
    </div>
</x-app-layout>
