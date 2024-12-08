function getWeatherForecast(lat, long) {
    const data = new URLSearchParams({
        key: '9410bc1b2b0e4f2583190037240712',
        q: lat + "," + long
    }).toString();
    const url = `https://api.weatherapi.com/v1/current.json?${data}`;
    fetch(url, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())  // Mengonversi response menjadi JSON
        .then(data => {
            document.getElementById('suhu_c').innerHTML = data.current.temp_c + '&deg C';
            document.getElementById('img_now').src = data.current.condition.icon;
            document.getElementById('text_detail').innerHTML = 'Under the sun, it feels like '+data.current.feelslike_c+'°C despite the actual temperature being '+data.current.temp_c+'°C.'+ " It's currently a "+data.current.condition.text;
            console.log('Response:', data);  // Menampilkan data response
        })
        .catch(error => {
            console.error('Error:', error);  // Menangani kesalahan
        });
}
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
    getWeatherForecast(latitude, longitude);
}

function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            console.log("User  denied the request for Geolocation.");
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
getLocation();