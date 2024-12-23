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
    .then(response => response.json())  // Mengonversi response menjadi JSON
    .then(data => {
        // Mendapatkan informasi cuaca yang diperlukan
        const currentWeather = data.current;
        const forecast = data.forecast.forecastday;
        const labels = forecast.map(day => day.date);  // Label untuk tanggal
        const temperatures = forecast.map(day => day.day.maxtemp_c);  // Suhu maksimum per hari
        
        // Menampilkan data cuaca saat ini
        document.getElementById('suhu_c').innerHTML = currentWeather.temp_c + '&deg C';
        document.getElementById('img_now').src = currentWeather.condition.icon;
        document.getElementById('text_detail').innerHTML = 'Under the sun, it feels like ' + currentWeather.feelslike_c + '°C despite the actual temperature being ' + currentWeather.temp_c + '°C.' + " It's currently a " + currentWeather.condition.text;
        createWeatherChart(labels, temperatures);

        // Menambahkan card untuk setiap hari dari forecast
        forecast.forEach(day => {

            const cardContainer = document.getElementById('forecast-cards'); // Pastikan Anda memiliki elemen dengan id 'forecast-cards' di HTML Anda
            
            // Membuat elemen card
            const card = document.createElement('div');
            card.classList.add('card');
            card.style.width = '200px';
            card.style.height = '250px';
            card.style.display = 'flex';
            card.style.justifyContent = 'center';
            card.style.alignItems = 'center';
            card.style.flexDirection = 'column';
            card.style.margin = '0';
            card.style.padding = '0';

            // Menambahkan gambar
            const img = document.createElement('img');
            img.src = `https:${day.day.condition.icon}`;
            img.alt = "Weather forecast image";
            img.style.height = '50%';
            img.style.width = '50%';
            img.style.objectFit = 'cover';
            img.style.objectPosition = 'center';
            img.style.margin = '0';
            card.appendChild(img);

            // Menambahkan card body
            const cardBody = document.createElement('div');
            cardBody.classList.add('card-body');
            cardBody.style.flex = '1';
            cardBody.style.padding = '10px';

            // Menambahkan judul
            const title = document.createElement('h2');
            title.classList.add('h1');
            title.classList.add('card-title');
            title.style.fontSize = '18px';
            title.style.marginBottom = '10px';
            title.innerHTML = `prakiraan cuaca </br> ${day.date}`;

            // Menambahkan deskripsi
            const description = document.createElement('p');
            description.classList.add('card-text');
            description.style.overflow = 'hidden';
            description.style.textOverflow = 'ellipsis';
            description.style.maxHeight = '120px';
            description.style.lineHeight = '1.5';
            description.style.whiteSpace = 'normal';
            description.innerHTML = `Temperature: ${day.day.avgtemp_c}°C, Condition: ${day.day.condition.text}`;

            cardBody.appendChild(title);
            cardBody.appendChild(description);
            card.appendChild(cardBody);

            // Menambahkan card ke container
            cardContainer.appendChild(card);
        });

        console.log('Response:', data);  // Menampilkan data response
    })
    .catch(error => {
        console.error('Error:', error);  // Menangani kesalahan
    });
}
function createWeatherChart(labels, temperatures) {
    const ctx = document.getElementById('weatherChart').getContext('2d');
    
    // Membuat chart dengan data suhu maksimum per hari
    new Chart(ctx, {
        type: 'line',  // Jenis grafik yang digunakan
        data: {
            labels: labels,  // Tanggal
            datasets: [{
                label: 'Suhu (°C)',  // Label data
                data: temperatures,  // Data suhu per hari
                borderColor: 'rgba(75, 192, 192, 1)',  // Warna garis
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Warna latar belakang area garis
                fill: true,  // Mengisi area bawah garis
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,  // Tidak dimulai dari nol
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
function changeIframeSrc(lat,long) {
    // Get the iframe element by its ID
    const iframe = document.getElementById('maps');

    // Set the new src attribute (Google Maps URL)
    iframe.src = 'https://www.google.com/maps?q='+lat+','+  long+'&z=14&output=embed';

    // Make the iframe visible after changing the src
    iframe.style.display = 'block';
}
function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
    getWeatherForecast(latitude, longitude);
    changeIframeSrc(latitude,longitude);
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

function displayEarthquakes(earthquakes) {
    const tableBody = document.querySelector('#earthquakeTable tbody');
    
    // Kosongkan isi tabel sebelumnya
    tableBody.innerHTML = '';
    var increment=0;
    earthquakes.forEach(eq => {
        increment++;
        const magnitude = eq.properties.mag;
        const location = eq.properties.place;
        const time = new Date(eq.properties.time).toLocaleString();  // Format waktu
        
        // Membuat baris tabel baru untuk setiap gempa
        const row = document.createElement('tr');
        
        // Membuat kolom untuk setiap data gempa
        const number = document.createElement('td');
        number.textContent = increment;
        row.appendChild(number);

        const magCell = document.createElement('td');
        magCell.textContent = magnitude;
        row.appendChild(magCell);
        
        const locationCell = document.createElement('td');
        locationCell.textContent = location;
        row.appendChild(locationCell);
        
        const timeCell = document.createElement('td');
        timeCell.textContent = time;
        row.appendChild(timeCell);
        
        // Menambahkan baris ke dalam tabel
        tableBody.appendChild(row);
    });
}
function getEarthquakeData() {
    const url = 'https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojson';  // URL API untuk gempa bumi terbaru
    
    fetch(url)
        .then(response => response.json())  // Mengonversi response menjadi JSON
        .then(data => {
            console.log('Data Gempa Bumi:', data);  // Menampilkan data response untuk debugging
            
            // Proses data untuk menampilkan informasi gempa (misalnya, lokasi dan magnitudo)
            const earthquakes = data.features;
            displayEarthquakes(earthquakes);
            earthquakes.forEach(eq => {
                const magnitude = eq.properties.mag;
                const location = eq.properties.place;
                const time = new Date(eq.properties.time);
                console.log(`Gempa Magnitude: ${magnitude}, Lokasi: ${location}, Waktu: ${time}`);
            });
        })
        .catch(error => {
            console.error('Error:', error);  // Menangani kesalahan
        });
}

// Memanggil fungsi untuk mendapatkan data gempa bumi
getEarthquakeData();

getLocation();
