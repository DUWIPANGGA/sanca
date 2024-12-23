<!-- Input Content -->
@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
    <div class="container-fluid h-100 ">
        <div class="row">
            @include('admin.sidebar')

            <div class="main-content">
                <div class="weather-cards" id="forecast-cards">
                    {{-- <div class="weather-card">
                        <h4>Mon</h4>
                        <i class="fas fa-cloud-sun"></i>
                        <p>28°C</p>
                    </div>
                    <div class="weather-card">
                        <h4>Tue</h4>
                        <i class="fas fa-cloud"></i>
                        <p>25°C</p>
                    </div>
                    <div class="weather-card">
                        <h4>Wed</h4>
                        <i class="fas fa-sun"></i>
                        <p>30°C</p>
                    </div>
                    <div class="weather-card">
                        <h4>Thu</h4>
                        <i class="fas fa-cloud-showers-heavy"></i>
                        <p>22°C</p>
                    </div>
                    <div class="weather-card">
                        <h4>Fri</h4>
                        <i class="fas fa-bolt"></i>
                        <p>20°C</p>
                    </div>
                    <div class="weather-card">
                        <h4>Sat</h4>
                        <i class="fas fa-cloud-rain"></i>
                        <p>23°C</p>
                    </div>
                    <div class="weather-card">
                        <h4>Sun</h4>
                        <i class="fas fa-wind"></i>
                        <p>24°C</p>
                    </div> --}}
                </div>
                {{-- <div class="map-card">
                    <h3>My Location</h3>
                    <iframe id="maps" src="https://www.google.com/maps?q=19.1710,-155.5075&z=14&output=embed" allowfullscreen="" loading="lazy"></iframe>
                </div> --}}
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
@endsection
