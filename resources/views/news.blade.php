<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PortalNews - Your portal news</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="p-5 mb-2 bg-info">
        <div class="d-flex justify-content-center">
            <h1><u>Portal<span class="text-light">News</span></u></h1>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($listNews as $key => $article)
            <div class="col">
                <a href="/news/article/{{ $key }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <img src="{{ $article['urlToImage'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article['title'] }}</h5>
                            <p class="card-text">{{ $article['description'] }}</p>
                            <p class="card-text"><small class="text-muted">Published in: {{ $article['publishedAt'] }}</small></p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-dark text-center text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <i class="fas fa-circle"></i>&copy; PortalNews - Your Portal News. <br>
                    Todos os direitos reservados.
                </div>
                <div class="col">
                    <a href="/api/documentation" class="text-white">Documentation</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
