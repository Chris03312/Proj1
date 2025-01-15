<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heatmap with Branding and Custom Pin</title>
    <!-- Include Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-heat@0.2.0/leaflet-heat.js"></script>

    <style>
        /* Set the size of the map */
        #map {
            height: 500px;
            position: relative;
        }

        /* Styling for custom logo */
        .logo {
            position: absolute;
            top: 20px; /* Adjust this value for vertical position */
            left: 20px; /* Adjust this value for horizontal position */
            z-index: 1000; /* Ensure logo stays on top */
            width: 150px; /* Adjust the size of the logo */
            opacity: 0.8; /* Optional: Set opacity for better blending */
        }
    </style>
</head>
<body>

    <div id="map"></div>

    <!-- Custom Logo -->
    <img src="C:\Project\views\assets\branding\green.png" alt="My Company Logo" class="logo">

    <script>
        // Initialize the map
        var map = L.map('map').setView([14.5995, 120.9842], 12); // Example coordinates (Manila, Philippines)

        // Add a tile layer (OpenStreetMap, you can use Google Maps or other tile providers)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add heatmap data (Example: Coordinates with intensity values)
        var heatData = [
            [14.5995, 120.9842, 0.5],  // [Latitude, Longitude, Intensity]
            [14.6271, 120.9947, 0.8],
            [14.5587, 121.0181, 0.9],
            [14.6103, 120.9935, 0.4],
            [14.5906, 121.0107, 1.0],
            // Add more data points here
        ];

        // Create and add the heatmap layer
        L.heatLayer(heatData, {
            radius: 100,
            blur: 15,
            maxZoom: 17
        }).addTo(map);

        // Custom pin location (marker with custom logo)
        var customIcon = L.icon({
            iconUrl: 'C:\Project\views\assets\branding\pin.png', // Path to your custom pin image
            iconSize: [64, 64],  // Adjust the size of the icon (increase size)
            iconAnchor: [32, 64],  // Anchor at the bottom center
            popupAnchor: [0, -64]  // Popup above the marker
        });

        // Add a marker with custom icon at a specific location
        var marker = L.marker([14.5995, 120.9842], { icon: customIcon }).addTo(map);

        // Bind a popup to the marker
        marker.bindPopup("<b>Custom Location</b><br>This is a custom marker with a logo.").openPopup();
    </script>

</body>
</html>
