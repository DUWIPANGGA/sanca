<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cuaca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        /* Hero Section */
        .hero_area {
            position: relative;
            background: url('{{ asset('storage/' . $article->picture_article) }}') no-repeat center center;
            background-size: cover;
            height: 400px;
            filter: brightness(50%);
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .hero_area h1 {
            font-size: 4rem;
            font-weight: bold;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
        }

        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .article-container {
            margin-top: 30px;
        }

        #article-main {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: -100px;
        }

        #article-main h1 {
            font-size: 48px;
            color: #333;
            font-weight: bold;
            margin-bottom: 30px;
        }

        #content-article {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            text-align: justify;
        }

        .futuristic-card {
            background: linear-gradient(135deg, #52bcec, #0058aa);
            border-radius: 15px;
            color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            padding: 20px;
            margin: 20px 0;
        }

        .futuristic-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .carousel-inner {
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="hero_area">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-floating" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <i class="fas fa-home"></i>
</a>
        <h1>{{ $article->judul }}</h1>
    </div>

    <div class="container-custom">
        <section id="article-main">
            <h1>{{ $article->judul }}</h1>
            <div id="content-article">
                {!! $article->content !!}
            </div>
        </section>
        <div class="row">
            <h3>Baca Juga</h3>
            @foreach ($recommendedArticles as $recommendedArticle)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-img-top"
                            style="background-image: url('{{ asset('storage/' . $recommendedArticle->picture_article) }}'); background-size: cover; background-position: center; height: 200px; filter: brightness(50%);">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" style="color: #333;">{{ $recommendedArticle->title }}</h5>
                            <p class="card-text" style="color: #333;">{!! Str::limit($recommendedArticle->content, 100) !!}</p>
                            <a href="{{ route('article.show.detail', $recommendedArticle->id) }}" class="btn btn-primary">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
