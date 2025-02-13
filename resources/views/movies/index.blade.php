@extends('app')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-10 justify-center">
    @foreach ($movies as $movie)
        <a href="{{ route('show', $loop->index) }}">

            <div class="w-72 h-[400px] rounded overflow-hidden shadow-lg bg-white transition-transform transform hover:scale-105 relative">
                <img class="w-full h-full object-cover" src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 text-white">
                    <h3 class="font-bold text-lg mb-1 truncate">{{ $movie['title'] }}</h3>
                    <p class="text-sm mb-1 truncate">{{ $movie['release_year'] }}</p>
                    <p class="text-sm mb-2 truncate">{{ $movie['category'] }}</p>
                    <div class="flex justify-between mt-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Edit</button>
                        <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition">Delete</button>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>




@endsection