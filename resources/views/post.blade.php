<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <h1>
    {{ $post->title }}
  </h1>
  <a href="">{{ $post->category->name }}</a>
  <p>
    <?= $post->body ?>
  </p>
  <a href="/">Go back</a>
</body>

</html>