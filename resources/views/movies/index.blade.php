<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Index</title>
</head>
<body>

    <ul>
        <?php foreach ($menu as $key => $value) : ?>
        <li><a href="<?php echo $value;?>"><?php echo $key;?></a></li>
        <?php endforeach;?>
    </ul>

    {{ dd($config) }}

    <h1>{{ $title }}</h1>
    {{ dd($movies) }}
</body>
</html>