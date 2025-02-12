<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <ul>
        <?php foreach ($menu as $key => $value) : ?>
        <li><a href="<?php echo $value;?>"><?php echo $key;?></a></li>
        <?php endforeach;?>
    </ul>
    <h1>Home page</h1>

    <h4> Movie Category</h4>

   {{-- for --}}
    @for ($i=0; $i < count($dataMovies); $i++)
        <li>{{ $dataMovies[$i]['title'] }} - {{ $dataMovies[$i]['year'] }}</li>
    @endfor
   {{-- foreach --}}

    <h1>Loop Dengan foreach</h1>

    @foreach ($dataMovies as $movie)
        <li>{{ $movie['title'] }} - {{ $movie['year'] }}</li>
    @endforeach
   {{-- forelse --}}
   <h1>Loop Dengan forelse</h1>

   @forelse ($dataMovies as $movie )
        <li>{{ $movie['title'] }} - {{ $movie['year'] }}</li>
   @empty
       <h3>Data Movie Tidak ditemukan </h3>
   @endforelse
   {{-- while --}}
  

</body>
</html>