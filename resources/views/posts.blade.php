<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <div>
    <article>
      <?php foreach( $posts as $post): ?>
      <h1>
        <?= $post->title ?>
      </h1>

      <?php endforeach; ?>
    </article>
</body>

</html>