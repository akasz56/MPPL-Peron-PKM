@props(['request', 'renderAs' => 'all'])

<a href="{{ route('requests.details', $request->id) }}"
    class="block p-6 mb-4 mr-4 w-max bg-white rounded-lg border border-gray-300 hover:bg-gray-100">
    @if ($renderAs == 'creator')
        <h5 class="text-2xl font-bold text-gray-900">{{ $request->author->name }}</h5>
    @elseif ($renderAs == 'developer')
        <h5 class="text-2xl font-bold text-gray-900">{{ $request->vacancy->title }}</h5>
    @else
        <h5 class="text-2xl font-bold text-gray-900">{{ $request->vacancy->title }}</h5>
        <p class="text-sm text-gray-900">{{ $request->author->name }}</p>
    @endif

    @if ($request->status == App\Helpers\Variables::REQUEST_STATUS_ACCEPTED)
        <span class="bg-green-500 text-white text-sm font-medium mt-2 px-2.5 py-0.5 rounded">Diterima</span>
    @elseif ($request->status == App\Helpers\Variables::REQUEST_STATUS_REJECTED)
        <span class="bg-red-500 text-white text-sm font-medium mt-2 px-2.5 py-0.5 rounded">Ditolak</span>
    @else
        <span class="bg-yellow-500 text-white text-sm font-medium mt-2 px-2.5 py-0.5 rounded">Menunggu</span>
    @endif
</a>
