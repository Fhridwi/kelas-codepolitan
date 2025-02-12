@extends('app')

@section('content')
<div class="flex flex-wrap justify-center mt-10 gap-8">
    @foreach ($movies as $movie)
        <div class="max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl rounded overflow-hidden shadow-lg bg-white transition-transform transform hover:scale-105">
            <img class="w-full h-56 object-cover" src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}">
            <div class="px-6 py-4">
                <h3 class="font-bold text-slate-700 text-xl mb-2 truncate">{{ $movie['title'] }}</h3>
                <p class="text-gray-700 text-base text-ellipsis overflow-hidden max-h-20 mb-2">{{ $movie['description'] }}</p>
                
                <!-- Additional Movie Information -->
                <p class="text-gray-600 text-sm mb-1 truncate">{{ $movie['release_year'] }}</p>
                <p class="text-gray-600 text-sm mb-1 truncate">{{ $movie['actors']['0'] }}</p>
                <p class="text-gray-600 text-sm mb-3 truncate">{{ $movie['category'] }}</p>
            </div>
            <div class="px-6 py-4 flex justify-between">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Watch</button>
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Details</button>
            </div>
        </div>
    @endforeach
</div>




@endsection