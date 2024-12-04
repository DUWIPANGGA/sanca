<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Cuaca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/style/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
            min-height: 150px; /* Increased height */
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
      font-size: 24px; /* Adjust icon size */
      cursor: pointer; /* Add a pointer cursor */
    }
    </style>
</head>
<body class="font-sans antialiased">
    <main class="m-0 p-0 w-100 hero-container">
        <!-- Header -->
        <header class="py-3 shadow-sm text-white position-sticky top-0" style="background-color: #0058aa; z-index:100">
            <div class="container d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-bars menu-icon " id="menu-toggle"></i>
                    <ul class="menu" id="menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <h1 class="h1 mb-0">SANCA</h1>
            </div>
        </header>

        <!-- Konten Utama -->
        <main class=" m-0 w-100">
            <div class="absolute-cloud"></div>

            <!-- Informasi Cuaca -->
            <div class="text-center mb-5 w-100 hero">
                <div class="weather cerah absolute-cuaca"></div>  
                <div class="position-absolute suhu-hero" style="z-index: 1; right: 10%; top: 50%;">
                    <h1>INDRAMAYU</h1>
                    <h1 class="fs-huge">20&deg;C</h1>
                    <h2>CUACA BERAWAN</h2>
                </div>
            </div>

            <!-- Card Cuaca Scroll -->
            <section class="mb-5 card-container">
                <h2 class="mb-3">Perkiraan Cuaca</h2>
                <div class="card-scroll h-100">
                    <div class="card futuristic-card p-3" style="min-width: 250px;">
                        <h5 class="card-title text-center">10:30</h5>
                        <div class="weather cerah"></div>
                        <p class="text-center fs-1">27&deg;C</p>
                        <p class="text-center">Hujan Ringan</p>
                    </div>
                    <div class="card futuristic-card p-3" style="min-width: 250px;">
                        <h5 class="card-title text-center">13:30</h5>
                        <div class="weather berawan"></div>
                        <p class="text-center fs-1">28&deg;C</p>
                        <p class="text-center">Ringan</p>
                    </div>
                    <div class="card futuristic-card p-3" style="min-width: 250px;">
                        <h5 class="card-title text-center">13:30</h5>
                        <div class="weather berangin"></div>
                        <p class="text-center fs-1">28&deg;C</p>
                        <p class="text-center">Ringan</p>
                    </div>
                    <div class="card futuristic-card p-3" style="min-width: 250px;">
                        <h5 class="card-title text-center">13:30</h5>
                        <div class="weather hujan"></div>
                        <p class="text-center fs-1">28&deg;C</p>
                        <p class="text-center">Ringan</p>
                    </div>
                    <div class="card futuristic-card p-3" style="min-width: 250px;">
                        <h5 class="card-title text-center">13:30</h5>
                        <div class="weather cerah-berawan"></div>
                        <p class="text-center fs-1">28&deg;C</p>
                        <p class="text-center">Ringan</p>
                    </div>
                </div>
            </section>
            <!-- Artikel -->
            <section class="article-container">
                <h2 class="mb-3">Artikel Terkini</h2>
                <div class="card">
                    <img src="https://csscardgenerator.pages.dev/images/placeholder_300_200.png" alt="preview img"/>
                    <div class="card-body">
                        <h2 class="card-title">Card Title</h2>  
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis esse aliquid hic.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://csscardgenerator.pages.dev/images/placeholder_300_200.png" alt="preview img"/>
                    <div class="card-body">
                        <h2 class="card-title">Card Title</h2>  
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis esse aliquid hic.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://csscardgenerator.pages.dev/images/placeholder_300_200.png" alt="preview img"/>
                    <div class="card-body">
                        <h2 class="card-title">Card Title</h2>  
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis esse aliquid hic.</p>
                    </div>
                </div>
            </section>
        </main>
    </main>

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
</body>
</html>