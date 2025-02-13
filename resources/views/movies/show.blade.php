@extends('app')

@section('content')
<div class="flex flex-col md:flex-row items-start">
    <div class="w-full md:w-1/3">
        <img src="{{ $movies['image'] }}" alt="{{ $movies['title'] }}" class="rounded-lg shadow-lg w-full h-auto object-cover">
    </div>
    <div class="md:ml-10 mt-5 w-full md:w-2/3">
        <h2 class="text-4xl font-bold mb-4">{{ $movies['title'] }}</h2>
        <p class="text-gray-600 text-lg mb-2">{{ $movies['release_year'] }}</p>
        <p class="text-gray-700">{{ $movies['description'] }}</p>
        
        <h3 class="text-xl font-semibold mt-4">Kategori</h3>
        <p class="text-gray-700">{{ $movies['category'] }}</p>


        <h3 class="text-xl font-semibold mt-4">Pemeran</h3>
        <p class="text-gray-700">
            @foreach ($movies['actors'] as $actors)
                {{ $actors }}
            @endforeach
        </p>
        <h3 class="text-xl font-semibold mt-4">Genre</h3>
        <p class="text-gray-700"> {{ $movies['category'] }}</p>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('edit', $movieId )}}"><button class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-700 transition">Edit</button></a>
            <button class="bg-gray-500 text-white px-6 py-3 rounded hover:bg-gray-700 transition">Delete</button>
        </div>
    </div>
</div>

@endsection