@props(['vacancy'])

<a href="{{ route('vacancies.details', $vacancy->id) }}"
    class="p-6 mb-4 w-96 bg-white rounded-lg border border-gray-300 hover:bg-gray-100">
    <h5 class="mb-2 text-2xl font-bold text-gray-900">{{ $vacancy->title }}</h5>
    <p class="mb-3 font-normal text-gray-700">{!! Str::limit($vacancy->desc, 150) !!}</p>
    <div class="flex items-center space-x-4">
        <div class="flex-shrink-0">
            <img class="w-8 h-8 rounded-full" src="{!! $vacancy->author->avatar !!}">
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 truncate">{{ $vacancy->author->name }}</p>
            <p class="text-sm text-gray-500 truncate">{{ $vacancy->author->faculty->name }}</p>
            <p class="text-sm text-gray-500 truncate">{{ $vacancy->author->department->name }}</p>
        </div>
    </div>
</a>
