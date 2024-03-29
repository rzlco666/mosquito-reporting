function getLocationConstant() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError, {
            enableHighAccuracy: true,
            timeout: 60000,
            maximumAge: 0
        });
    } else {
        alert("Your browser or device doesn't support Geolocation");
    }
}

// If we have a successful location update
function onGeoSuccess(event) {
    document.getElementById("Latitude").value = event.coords.latitude;
    document.getElementById("Longitude").value = event.coords.longitude;
    document.getElementById("Position1").value = event.coords.longitude + ", " + event.coords.latitude;

}

// If something has gone wrong with the geolocation request
function onGeoError(event) {
    alert("Error code " + event.code + ". " + event.message);
}