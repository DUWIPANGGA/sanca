<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/trix@2.0.8/dist/trix.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #8A92FF, #C7D2FE);
        }

        .dashboard {
            display: grid;
            grid-template-columns: 80px 1fr;
            height: 100vh;
        }

        .sidebar {
            background: #4A56E2;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0;
            overflow: hidden;
        }

        .sidebar img {
            width: 40px;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar ul li:hover {
            color: #C7D2FE;
        }

        .main-content {
            background: #ffffff;
            padding: 20px;
            overflow-y: auto;
        }

        .weather-cards {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .weather-card {
            background: #EFF2FE;
            padding: 10px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .weather-card h4 {
            margin: 10px 0;
            font-size: 16px;
        }

        .weather-card i {
            font-size: 24px;
            color: #4A56E2;
        }

        .weather-card p {
            margin: 5px 0;
            font-size: 14px;
        }

        .map-card {
            background: #EFF2FE;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        iframe {
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 10px;
        }

        .charts {
            display: flex;
            margin-top: 20px;
            justify-content: space-between;
        }

        .chart, .map {
            background: #EFF2FE;
            flex: 1;
            margin: 10px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .active-params {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .param-button {
            background: linear-gradient(to right, #4A56E2, #6A75F0);
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.3s, transform 0.3s;
        }

        .param-button:hover {
            background: linear-gradient(to right, #6A75F0, #4A56E2);
            transform: scale(1.05);
        }

        .article-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 15px;
        }

        .article-card {
            background: #EFF2FE;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .article-card h3 {
            margin: 0 0 10px;
        }

        .article-card p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

    </style>
</head>
<body>
    <div class="dashboard">
    <div class="sidebar" style="width: ">
        <img src="{{ asset('images/faicon.png') }}" style="width: 2rem; aspect-ratio: 1/1;" alt="Logo">
        <ul>
            <li><a class="nav-link text-white" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i></a></li>
            @if(Auth::user()->role == 'admin')
            <li><a class="nav-link text-white" href="{{ route('article.main') }}"><i class="fas fa-newspaper"></i></a></li>
            <li><a class="nav-link text-white" href="{{ route('article.create') }}"><i class="fas fa-edit"></i></a></li>
            <li><a class="nav-link text-white" href="{{ route('user.show') }}"><i class="fas fa-user"></i></a></li>
            @endif
            <li class="d-flex flex-column"> <a class="nav-link text-white" data-bs-toggle="collapse" href="#settingsMenu"
                    role="button" aria-expanded="false" aria-controls="settingsMenu">
                    <i class="fas fa-cogs"></i>
                </a>
                <div class="collapse mt-2" id="settingsMenu">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
        <div class="main-content">
            <div class="weather-cards" id="forecast-cards">
                
            </div>
            <div class="charts">
                <div class="chart">
                    <h3>Prediksi Cuaca</h3>
                    <canvas id="chart1"></canvas>
                </div>
                <div class="map">
                    <h3>Data Gempa Bumi</h3>
                    <canvas id="chart2"></canvas>
                </div>
            </div>
            <div class="article-cards">
                @foreach ($articles as $article)
                <a href="{{ route('article.show.detail', $article->id) }}" class="article-card"
                    style=" display: flex; flex-direction: column; margin: 10px; padding: 0; text-decoration: none;">
                    <!-- Card Body -->
                    <div class="card-body" 
                        style="flex: 1; padding: 10px; background-image: url('{{ asset('storage/' . $article->picture_article) }}'); background-size: cover; background-position: center; height: 150px; margin: 0;">
                        
                        <!-- Title and Content -->
                        <h2 class="h1 card-title"
                            style="font-size: 16px; margin-bottom: 10px; font-weight: bold; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: white;">
                            {{ $article->judul }}
                        </h2>
                        <p class="card-text"
                            style="overflow: hidden; text-overflow: ellipsis; max-height: 80px; line-height: 1.5; white-space: normal; color: white;">
                            {{ strip_tags($article->content) }}
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="active-params">
                <button class="param-button"><i class="fas fa-leaf"></i> Eco Mode</button>
                <button class="param-button"><i class="fas fa-fire"></i> Heat Boost</button>
                <button class="param-button"><i class="fas fa-thermometer-empty"></i> Cool Mode</button>
                <button class="param-button"><i class="fas fa-sync"></i> Auto Adjust</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script>
    // Example chart rendering using Chart.js library
    document.addEventListener("DOMContentLoaded", function() {
        const ctx1 = document.getElementById('chart1').getContext('2d');
        const ctx2 = document.getElementById('chart2').getContext('2d');

        // new Chart(ctx1, {
        //     type: 'bar',
        //     data: {
        //         labels: ['Jan', 'Feb', 'Mar', 'Apr'],
        //         datasets: [{
        //             label: 'Comfort Range',
        //             data: [12, 19, 3, 5],
        //             backgroundColor: 'rgba(75, 192, 192, 0.2)',
        //             borderColor: 'rgba(75, 192, 192, 1)',
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //     }
        // });

        // new Chart(ctx2, {
        //     type: 'line',
        //     data: {
        //         labels: ['Mon', 'Tue', 'Wed', 'Thu'],
        //         datasets: [{
        //             label: 'Damaging Wind',
        //             data: [50, 40, 60, 30],
        //             backgroundColor: 'rgba(153, 102, 255, 0.2)',
        //             borderColor: 'rgba(153, 102, 255, 1)',
        //             borderWidth: 1,
        //             tension: 0.4 // Smooth sinusoidal curves
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //     }
        // });
    });



    function getWeatherForecast(lat, long) {
        const data = new URLSearchParams({
            key: '9410bc1b2b0e4f2583190037240712',
            q: lat + "," + long,
            days: 7
        }).toString();
        const url = `https://api.weatherapi.com/v1/forecast.json?${data}`;

        fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json()) // Mengonversi response menjadi JSON
            .then(data => {
                // Mendapatkan informasi cuaca dari forecast
                const forecast = data.forecast.forecastday;

                // Menghapus semua kartu cuaca lama sebelum menambahkan yang baru
                const forecastContainer = document.getElementById('forecast-cards');
                forecastContainer.innerHTML = '';
                const currentWeather = data.current;
                const labels = forecast.map(day => day.date); // Label untuk tanggal
                const temperatures = forecast.map(day => day.day.maxtemp_c); // Suhu maksimum per hari
                // Menambahkan card untuk setiap hari dari forecast
                forecast.forEach(day => {
                    // Membuat elemen card
                    const card = document.createElement('div');
                    card.classList.add('weather-card');

                    // Menambahkan nama hari (misalnya, Mon, Tue, Wed, dll)
                    const dayName = new Date(day.date).toLocaleString('en-us', {
                        weekday: 'short'
                    });
                    const dayHeading = document.createElement('h4');
                    dayHeading.innerText = dayName;
                    card.appendChild(dayHeading);

                    // Menambahkan icon cuaca
                    const weatherIcon = document.createElement('i');
                    weatherIcon.classList.add('fas');
                    switch (day.day.condition.code) {
                        case 1000: // Sunny
                            weatherIcon.classList.add('fa-sun');
                            break;
                        case 1003: // Partly cloudy
                            weatherIcon.classList.add('fa-cloud-sun');
                            break;
                        case 1006: // Cloudy
                            weatherIcon.classList.add('fa-cloud');
                            break;
                        case 1063: // Light rain
                            weatherIcon.classList.add('fa-cloud-showers-heavy');
                            break;
                        case 1153: // Heavy rain
                            weatherIcon.classList.add('fa-cloud-rain');
                            break;
                        case 1183: // Thunderstorm
                            weatherIcon.classList.add('fa-bolt');
                            break;
                        default:
                            weatherIcon.classList.add('fa-cloud');
                    }
                    card.appendChild(weatherIcon);

                    // Menambahkan suhu
                    const temperature = document.createElement('p');
                    temperature.innerText = `${day.day.avgtemp_c}°C`;
                    card.appendChild(temperature);

                    // Menambahkan card ke container
                    forecastContainer.appendChild(card);

                    createWeatherChart(labels, temperatures);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function createWeatherChart(labels, temperatures) {
        const ctx = document.getElementById('chart1').getContext('2d');

        // Membuat chart dengan data suhu maksimum per hari
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Suhu (°C)',
                    data: temperatures,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.4 // Smooth sinusoidal curves
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                    }
                }
            }
        });
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function changeIframeSrc(lat, long) {
        // Get the iframe element by its ID
        // const iframe = document.getElementById('maps');

        // Set the new src attribute (Google Maps URL)
        // iframe.src = 'https://www.google.com/maps?q='+lat+','+  long+'&z=14&output=embed';

        // Make the iframe visible after changing the src
        // iframe.style.display = 'block';
    }

    function showPosition(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
        getWeatherForecast(latitude, longitude);
        // changeIframeSrc(latitude,longitude);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                console.log("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                console.log("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                console.log("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                console.log("An unknown error occurred.");
                break;
        }
    }

    function displayEarthquakeData(earthquakes) {
        var earthquakeLabels = []; // Untuk menyimpan lokasi gempa
        var earthquakeMagnitudes = []; // Untuk menyimpan magnitudo gempa

        earthquakes.forEach(eq => {
            const magnitude = eq.properties.mag;
            const location = eq.properties.place;

            // Menambahkan data ke chart
            earthquakeLabels.push(location);
            earthquakeMagnitudes.push(magnitude);
        });

        // Membuat chart dengan data gempa yang telah dimasukkan
        const ctx2 = document.getElementById('chart2').getContext('2d');
        new Chart(ctx2, {
            type: 'bubble',
            data: {
                labels: earthquakeLabels,
                datasets: [{
                    label: 'Magnitude of Earthquakes',
                    data: earthquakeMagnitudes.map((magnitude, index) => ({
                        x: index,
                        y: magnitude,
                        r: magnitude * 2
                    })),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        ticks: {
                            maxRotation: 45,
                            minRotation: 0
                        },
                        title: {
                            display: true,
                            text: 'Location'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Magnitude'
                        }
                    }
                }
            }
        });
    }

    function getEarthquakeData() {
        const url =
        'https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson'; // URL API untuk gempa bumi terbaru

        fetch(url)
            .then(response => response.json()) // Mengonversi response menjadi JSON
            .then(data => {
                console.log('Data Gempa Bumi:', data); // Menampilkan data response untuk debugging

                // Proses data untuk menampilkan informasi gempa (misalnya, lokasi dan magnitudo)
                const earthquakes = data.features;
                displayEarthquakeData(earthquakes);
                earthquakes.forEach(eq => {
                    const magnitude = eq.properties.mag;
                    const location = eq.properties.place;
                    const time = new Date(eq.properties.time);
                    console.log(`Gempa Magnitude: ${magnitude}, Lokasi: ${location}, Waktu: ${time}`);
                });
            })
            .catch(error => {
                console.error('Error:', error); // Menangani kesalahan
            });
    }

    // Memanggil fungsi untuk mendapatkan data gempa bumi
    getEarthquakeData();

    getLocation();
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
