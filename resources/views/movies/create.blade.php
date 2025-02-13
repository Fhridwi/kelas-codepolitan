@extends('app')


@section('content')

{{-- @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
@endif --}}

<div class="max-w-2xl mx-auto p-6  rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-center ">Tambah Movie</h2>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full p-2 border rounded-lg text-white bg-transparent">
        </div>

        @error('title')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
      
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description"  id="description" rows="3" class="w-full p-2 border rounded-lg  bg-transparent">{{ old('description') }}</textarea>
        </div>
        @error('description')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="release_year" class="block text-sm font-medium text-gray-700">Tahun Rilis</label>
            <input type="number" name="release_year" value="{{ old('release_year') }}" id="release_year" class="w-full p-2 border rounded-lg  bg-transparent">
        </div>
        @error('release_year')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" class="w-full p-2 border rounded-lg  bg-transparent">
        </div>
        @error('category')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="actors" class="block text-sm font-medium text-gray-700">Pemeran (pisahkan dengan koma)</label>
            <input type="text" name="actors" value="{{ old('actors') }}" id="actors" class="w-full p-2 border rounded-lg  bg-transparent">
        </div>
        @error('actors')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">URL Gambar</label>
            <input type="text" name="image" id="image" value="{{ old('image') }}" class="w-full p-2 border rounded-lg  bg-transparent">
        </div>
        @error('image')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Tambah</button>
        </div>
    </form>
</div>

@endsection