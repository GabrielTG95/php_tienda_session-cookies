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
    <script src="/tienda/content/js/favoritos.js"></script>
    <script src="/tienda/content/js/visitas.js"></script>
    <title>Cookies</title>
</head>
<body>
<div class="container">
    <header>
        <h1><a href="/tienda/index.php">Práctica Cookies</a></h1>
    </header>
    <section>
        <div class="d-flex justify-content-between flex-wrap">
            <h2><?= getArtInfo()['nombre'] . ' ' . mostrarFavorito() ?></h2>
            <div class="row">
                <div class="col-lg-3 col-md-4 text-center">
                    <img src="<?= getArtInfo()['imagen'] ?>" alt="Imagen del artículo">
                </div>
                <div class="col-lg-9 col-md-8" id="descripcion">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas placerat justo et eros rutrum
                        laoreet.
                        Praesent tristique nisi a ligula mollis rutrum. Sed eleifend lacus elit, sed lacinia est
                        volutpat vel.
                        Donec at felis quis justo tristique fringilla et vitae tortor. Donec feugiat tempor varius.
                        Praesent
                        maximus id metus ac malesuada. Donec sed felis at dui laoreet viverra non sed arcu. Sed semper
                        tortor sit
                        amet justo lacinia, in gravida nisi vulputate. Morbi fermentum velit est, eget pretium quam
                        malesuada vel.
                        Aenean vehicula dui justo, lacinia posuere nulla pellentesque at. Proin posuere ornare aliquam.
                    </p>
                    <p>
                        Suspendisse fermentum elit nisl, sit amet pretium felis hendrerit eget. Aenean ut risus mauris.
                        Donec sit
                        amet ipsum a erat feugiat commodo pellentesque id leo. Curabitur non lobortis ex, sed elementum
                        nunc. Ut
                        id iaculis enim, in pretium ex. Duis egestas malesuada finibus. Curabitur lobortis vestibulum
                        lacus. Donec
                        vestibulum facilisis facilisis. Sed sapien enim, faucibus molestie finibus ac, tincidunt ut
                        nisl. Vivamus
                        venenatis gravida ante, ut faucibus velit. Curabitur vitae felis magna. Morbi vitae est enim.
                        Cras at odio
                        quis tortor tempor dapibus vel nec nibh.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>