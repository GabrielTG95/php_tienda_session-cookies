<!doctype html>
<html lang="es">
<head>
  <!--Bootsrap 5-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <!--jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--Meta-->
  <meta name="author" content="Gabriel Trujillo González">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--CSS y JavaScript Interno-->
  <link rel="stylesheet" href="../../content/css/style.css">
  <script src="../../content/js/favoritos.js"></script>
  <title>Cookies</title>
</head>
<body>
<div class="container-fluid">
  <header>
    <h1>Favoritos</h1>
  </header>
  <section>
    <div class="d-flex flex-wrap">
      <?php
        getFavoritos();
      ?>
    </div>
  </section>
</div>

</body>
</html><?php
