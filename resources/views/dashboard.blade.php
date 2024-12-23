<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cuaca</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="shortcut icon" href="images/faicon.png" type="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/faicon.png" type="">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f4f8;
            color: #333;
        }

        .card-scroll {
            display: flex;
            overflow-x: auto;
            gap: 1rem;
            padding: 1rem;
        }

        .card-scroll::-webkit-scrollbar {
            height: 8px;
        }

        .card-scroll::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 8px;
        }

        .article-container {
            margin-top: 2rem;
        }

        /* Futuristic Card Styles */
        .futuristic-card {
            background: linear-gradient(135deg, #52bcec, #0058aa);
            border-radius: 15px;
            color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            min-height: 150px;
            /* Increased height */
        }

        .futuristic-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .article-image {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
        }

        .menu-icon {
            font-size: 24px;
            /* Adjust icon size */
            cursor: pointer;
            /* Add a pointer cursor */
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="hero_area">
        <div class="hero_bg_box">
            <div class="bg_img_box">
                <img src="images/hero-bg.png" alt="">
            </div>
        </div>
        <main class="m-0 p-0 w-100 hero-container">
           @include('template.header')

            <!-- Header -->


            <!-- Konten Utama -->
            <main class=" m-0 w-100">
                <section class="slider_section ">
                    <div class="absolute-cloud"></div>

                    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="detail-box" style="position : relative;z-index: 101;">
                                                <img id="img_now" src="" alt="" class=""
                                                    style="height : 100px;aspect-ratio : 1/1;">
                                                <h1 id="suhu_c">
                                                </h1>
                                                <p id="text_detail">
                                                </p>
                                                <div class="btn-box">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="img-box">
                                                <img id="img_suhu" src="images/slider-img.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
    </div>
    <ol class="carousel-indicators">
        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#customCarousel1" data-slide-to="1"></li>
        <li data-target="#customCarousel1" data-slide-to="2"></li>
    </ol>
    </div>

    </section>
    <!-- Artikel -->

    <section class="article-container row d-flex justify-center align-items-start w-100" 
    style="gap: 20px; flex-wrap: wrap; padding-left: 20px;">
    <h2 class="mb-3 w-100">Artikel Terkini</h2>
    @foreach ($articles as $article)
        <a href="{{ route('article.show.detail',$article->id) }}" class="card" style="width: 300px; height: 400px; display: flex; flex-direction: column; margin: 0; padding:0; ">
            <img src="{{ asset('storage/' . $article->picture_article) }}" alt="preview img"
                style="height: 250px; object-fit: cover; object-position: center; margin: 0;" />
            <div class="card-body" style="flex: 1; padding: 10px;">
                <h2 class="h1 card-title" style="font-size: 18px; margin-bottom: 10px;">{{ $article->judul }}</h2>
                <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; max-height: 120px; line-height: 1.5; white-space: normal;">{{ strip_tags($article->content) }}</p>
            </div>
        </a>
    @endforeach
</section>


    </main>
    </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuToggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('menu');

            menuToggle.addEventListener('click', () => {
                menu.classList.toggle('show');
            });
        });
    </script>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- custom js -->
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <script src="js/weather.js"></script>
</body>

</html>
