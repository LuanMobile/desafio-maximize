<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortalNews - Your portal news</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="p-5 mb-2 bg-info">
        <div class="d-flex justify-content-center">
            <h1><u>Portal<span class="text-light">News</span></u></h1>
        </div>

        <div>
            <a href="/" class="text-body">Voltar para as Notícias</a>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="card mb-4">
                    <img src="{{ $article['urlToImage'] }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article['title'] }}</h5>
                        <p class="card-text">{{ $article['description'] }}</p>
                        <p class="card-text"><small class="text-muted">Published in: {{ $article['publishedAt'] }}</small></p>
                        <p class="card-text mb-0">{!! html_entity_decode($article['content']) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-center text-white p-3">
        <i class="fa-solid fa-circle-c"></i>&copy; PortalNews - Your Portal News. <br>
        Todos os direitos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>