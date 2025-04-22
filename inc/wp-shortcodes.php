<?php
function mostrar_mapa_shortcode() {
    $locations = array(
        array(
            'label' => 'Gelatería Dolcefina Salamanca',
            'lat' => 40.4223691,
            'lng' => -3.6831007
        ),
        array(
            'label' => 'Gelateria Dolcefina Chamberi',
            'lat' => 40.4368949,
            'lng' => -3.6998677
        ),
        array(
            'label' => 'Gelateria Dolcefina Centro',
            'lat' => 40.4267639,
            'lng' => -3.7036229
        ),
        array(
            'label' => 'Gelateria Dolcefina Cascorro',
            'lat' => 40.4109748,
            'lng' => -3.7074469
        ),
        array(
            'label' => 'Gelatería La Dolce Fina Alcobendas',
            'lat' => 40.5085624,
            'lng' => -3.6451435
        ),
        array(
            'label' => 'Gelatería La Dolce Fina Majadahonda',
            'lat' => 40.44249,
            'lng' => -3.8456293
        )
    );

    ob_start(); 
    ?>
    <div id="map-locations" data-locations="<?php echo htmlspecialchars(json_encode($locations)); ?>"></div>
    <div id="map" style="width: 100%; height: 500px;"></div>

    <script type="module">
    console.log("acf-maps.js 2");

/**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
import { MarkerClusterer } from "https://cdn.skypack.dev/@googlemaps/markerclusterer@2.3.1";
const locations = JSON.parse(document.getElementById('map-locations').dataset.locations);
async function initMap() {
    // Request needed libraries.
    console.log('iniciando mapa');
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
        "marker",
    );
    //funcion que pinta mapa
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: { lat: 40.4267639 , lng: -3.7036229 } ,
        mapId: "428d46b9bd6e05b7",
    });
    const infoWindow = new google.maps.InfoWindow({
        content: "",
        disableAutoPan: true,
    });

    // Add some markers to the map.
    const markers = locations.map((position, i) => {
        if (position.lat !== 0 && position.lng !== 0){}
        const label = ".";
        const pinGlyph = new google.maps.marker.PinElement({
            glyph: label,
            glyphColor: "#af95d3",
            background: "#af95d3",
            borderColor: "#af95d3",
        });
        const marker = new google.maps.marker.AdvancedMarkerElement({
            position,
            content: pinGlyph.element,
        });

        // markers can only be keyboard focusable when they have click listeners
        // open info window when marker is clicked
        marker.addListener("click", () => {
            infoWindow.setContent(position.label);
            infoWindow.open(map, marker);
        });
        return marker;
    });
    console.log('markers: ');
    console.log(markers);


    // Define a custom renderer for the cluster
    const customRenderer = {
        render: ({ count, position }) => {
            // Create a custom HTML element for the cluster
            const div = document.createElement("div");
            console.log();
            div.style.width = `${30 + count * 0.5}px`; // Dynamically size based on count
            div.style.height = `${30 + count * 0.5}px`;
            div.style.borderRadius = "50%";
            div.style.backgroundColor = count > 50 ? "#af95d3" : count > 10 ? "#1675a9" : "#af95d3";
            div.style.color = "white";
            div.style.display = "flex";
            div.style.justifyContent = "center";
            div.style.alignItems = "center";
            div.style.fontSize = "14px";
            div.style.boxShadow = "0 2px 6px rgba(0,0,0,0.3)";
            div.style.border = "2px solid #aecad9";
            div.innerText = count; // Display the count inside the cluster

            // Return a marker-like cluster object
            return new google.maps.marker.AdvancedMarkerElement({
                position,
                content: div,
            });
        },
    };
    console.log(customRenderer);
    // Add a marker clusterer to manage the markers.
    new MarkerClusterer({ markers, map, renderer: customRenderer });
}

// create a const locations array taking the data from an data-locations attribute of a div with id #map-locations

console.log(locations);
initMap();
console.log('funcion que ejecuta mapa');
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFjZi1tYXAuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoiYWNmLW1hcC5taW4uanMiLCJzb3VyY2VzQ29udGVudCI6WyJjb25zb2xlLmxvZyhcImFjZi1tYXBzLmpzIDJcIik7XG5cbi8qKlxuICogQGxpY2Vuc2VcbiAqIENvcHlyaWdodCAyMDE5IEdvb2dsZSBMTEMuIEFsbCBSaWdodHMgUmVzZXJ2ZWQuXG4gKiBTUERYLUxpY2Vuc2UtSWRlbnRpZmllcjogQXBhY2hlLTIuMFxuICovXG5pbXBvcnQgeyBNYXJrZXJDbHVzdGVyZXIgfSBmcm9tIFwiaHR0cHM6Ly9jZG4uc2t5cGFjay5kZXYvQGdvb2dsZW1hcHMvbWFya2VyY2x1c3RlcmVyQDIuMy4xXCI7XG5jb25zdCBsb2NhdGlvbnMgPSBKU09OLnBhcnNlKGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdtYXAtbG9jYXRpb25zJykuZGF0YXNldC5sb2NhdGlvbnMpO1xuYXN5bmMgZnVuY3Rpb24gaW5pdE1hcCgpIHtcbiAgICAvLyBSZXF1ZXN0IG5lZWRlZCBsaWJyYXJpZXMuXG4gICAgY29uc29sZS5sb2coJ2luaWNpYW5kbyBtYXBhJyk7XG4gICAgY29uc3QgeyBNYXAsIEluZm9XaW5kb3cgfSA9IGF3YWl0IGdvb2dsZS5tYXBzLmltcG9ydExpYnJhcnkoXCJtYXBzXCIpO1xuICAgIGNvbnN0IHsgQWR2YW5jZWRNYXJrZXJFbGVtZW50LCBQaW5FbGVtZW50IH0gPSBhd2FpdCBnb29nbGUubWFwcy5pbXBvcnRMaWJyYXJ5KFxuICAgICAgICBcIm1hcmtlclwiLFxuICAgICk7XG4gICAgLy9mdW5jaW9uIHF1ZSBwaW50YSBtYXBhXG4gICAgY29uc3QgbWFwID0gbmV3IGdvb2dsZS5tYXBzLk1hcChkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcIm1hcFwiKSwge1xuICAgICAgICB6b29tOiA3LFxuICAgICAgICBjZW50ZXI6IHsgbGF0OiAzNy41MjQ2MzIzLCBsbmc6IC03Ny41NzU2NjIgfSxcbiAgICAgICAgbWFwSWQ6IFwiNDI4ZDQ2YjliZDZlMDViN1wiLFxuICAgIH0pO1xuICAgIGNvbnN0IGluZm9XaW5kb3cgPSBuZXcgZ29vZ2xlLm1hcHMuSW5mb1dpbmRvdyh7XG4gICAgICAgIGNvbnRlbnQ6IFwiXCIsXG4gICAgICAgIGRpc2FibGVBdXRvUGFuOiB0cnVlLFxuICAgIH0pO1xuXG4gICAgLy8gQWRkIHNvbWUgbWFya2VycyB0byB0aGUgbWFwLlxuICAgIGNvbnN0IG1hcmtlcnMgPSBsb2NhdGlvbnMubWFwKChwb3NpdGlvbiwgaSkgPT4ge1xuICAgICAgICBpZiAocG9zaXRpb24ubGF0ICE9PSAwICYmIHBvc2l0aW9uLmxuZyAhPT0gMCl7fVxuICAgICAgICBjb25zdCBsYWJlbCA9IFwiLlwiO1xuICAgICAgICBjb25zdCBwaW5HbHlwaCA9IG5ldyBnb29nbGUubWFwcy5tYXJrZXIuUGluRWxlbWVudCh7XG4gICAgICAgICAgICBnbHlwaDogbGFiZWwsXG4gICAgICAgICAgICBnbHlwaENvbG9yOiBcIiMxNjc1YTlcIixcbiAgICAgICAgICAgIGJhY2tncm91bmQ6IFwiIzE2NzVhOVwiLFxuICAgICAgICAgICAgYm9yZGVyQ29sb3I6IFwiIzE2NzVhOVwiLFxuICAgICAgICB9KTtcbiAgICAgICAgY29uc3QgbWFya2VyID0gbmV3IGdvb2dsZS5tYXBzLm1hcmtlci5BZHZhbmNlZE1hcmtlckVsZW1lbnQoe1xuICAgICAgICAgICAgcG9zaXRpb24sXG4gICAgICAgICAgICBjb250ZW50OiBwaW5HbHlwaC5lbGVtZW50LFxuICAgICAgICB9KTtcblxuICAgICAgICAvLyBtYXJrZXJzIGNhbiBvbmx5IGJlIGtleWJvYXJkIGZvY3VzYWJsZSB3aGVuIHRoZXkgaGF2ZSBjbGljayBsaXN0ZW5lcnNcbiAgICAgICAgLy8gb3BlbiBpbmZvIHdpbmRvdyB3aGVuIG1hcmtlciBpcyBjbGlja2VkXG4gICAgICAgIG1hcmtlci5hZGRMaXN0ZW5lcihcImNsaWNrXCIsICgpID0+IHtcbiAgICAgICAgICAgIGluZm9XaW5kb3cuc2V0Q29udGVudChwb3NpdGlvbi5sYWJlbCk7XG4gICAgICAgICAgICBpbmZvV2luZG93Lm9wZW4obWFwLCBtYXJrZXIpO1xuICAgICAgICB9KTtcbiAgICAgICAgcmV0dXJuIG1hcmtlcjtcbiAgICB9KTtcbiAgICBjb25zb2xlLmxvZygnbWFya2VyczogJyk7XG4gICAgY29uc29sZS5sb2cobWFya2Vycyk7XG5cblxuICAgIC8vIERlZmluZSBhIGN1c3RvbSByZW5kZXJlciBmb3IgdGhlIGNsdXN0ZXJcbiAgICBjb25zdCBjdXN0b21SZW5kZXJlciA9IHtcbiAgICAgICAgcmVuZGVyOiAoeyBjb3VudCwgcG9zaXRpb24gfSkgPT4ge1xuICAgICAgICAgICAgLy8gQ3JlYXRlIGEgY3VzdG9tIEhUTUwgZWxlbWVudCBmb3IgdGhlIGNsdXN0ZXJcbiAgICAgICAgICAgIGNvbnN0IGRpdiA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJkaXZcIik7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygpO1xuICAgICAgICAgICAgZGl2LnN0eWxlLndpZHRoID0gYCR7MzAgKyBjb3VudCAqIDAuNX1weGA7IC8vIER5bmFtaWNhbGx5IHNpemUgYmFzZWQgb24gY291bnRcbiAgICAgICAgICAgIGRpdi5zdHlsZS5oZWlnaHQgPSBgJHszMCArIGNvdW50ICogMC41fXB4YDtcbiAgICAgICAgICAgIGRpdi5zdHlsZS5ib3JkZXJSYWRpdXMgPSBcIjUwJVwiO1xuICAgICAgICAgICAgZGl2LnN0eWxlLmJhY2tncm91bmRDb2xvciA9IGNvdW50ID4gNTAgPyBcIiMxNjc1YTlcIiA6IGNvdW50ID4gMTAgPyBcIiMxNjc1YTlcIiA6IFwiIzE2NzVhOVwiO1xuICAgICAgICAgICAgZGl2LnN0eWxlLmNvbG9yID0gXCJ3aGl0ZVwiO1xuICAgICAgICAgICAgZGl2LnN0eWxlLmRpc3BsYXkgPSBcImZsZXhcIjtcbiAgICAgICAgICAgIGRpdi5zdHlsZS5qdXN0aWZ5Q29udGVudCA9IFwiY2VudGVyXCI7XG4gICAgICAgICAgICBkaXYuc3R5bGUuYWxpZ25JdGVtcyA9IFwiY2VudGVyXCI7XG4gICAgICAgICAgICBkaXYuc3R5bGUuZm9udFNpemUgPSBcIjE0cHhcIjtcbiAgICAgICAgICAgIGRpdi5zdHlsZS5ib3hTaGFkb3cgPSBcIjAgMnB4IDZweCByZ2JhKDAsMCwwLDAuMylcIjtcbiAgICAgICAgICAgIGRpdi5zdHlsZS5ib3JkZXIgPSBcIjJweCBzb2xpZCAjYWVjYWQ5XCI7XG4gICAgICAgICAgICBkaXYuaW5uZXJUZXh0ID0gY291bnQ7IC8vIERpc3BsYXkgdGhlIGNvdW50IGluc2lkZSB0aGUgY2x1c3RlclxuXG4gICAgICAgICAgICAvLyBSZXR1cm4gYSBtYXJrZXItbGlrZSBjbHVzdGVyIG9iamVjdFxuICAgICAgICAgICAgcmV0dXJuIG5ldyBnb29nbGUubWFwcy5tYXJrZXIuQWR2YW5jZWRNYXJrZXJFbGVtZW50KHtcbiAgICAgICAgICAgICAgICBwb3NpdGlvbixcbiAgICAgICAgICAgICAgICBjb250ZW50OiBkaXYsXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSxcbiAgICB9O1xuICAgIGNvbnNvbGUubG9nKGN1c3RvbVJlbmRlcmVyKTtcbiAgICAvLyBBZGQgYSBtYXJrZXIgY2x1c3RlcmVyIHRvIG1hbmFnZSB0aGUgbWFya2Vycy5cbiAgICBuZXcgTWFya2VyQ2x1c3RlcmVyKHsgbWFya2VycywgbWFwLCByZW5kZXJlcjogY3VzdG9tUmVuZGVyZXIgfSk7XG59XG5cbi8vIGNyZWF0ZSBhIGNvbnN0IGxvY2F0aW9ucyBhcnJheSB0YWtpbmcgdGhlIGRhdGEgZnJvbSBhbiBkYXRhLWxvY2F0aW9ucyBhdHRyaWJ1dGUgb2YgYSBkaXYgd2l0aCBpZCAjbWFwLWxvY2F0aW9uc1xuXG5jb25zb2xlLmxvZyhsb2NhdGlvbnMpO1xuaW5pdE1hcCgpO1xuY29uc29sZS5sb2coJ2Z1bmNpb24gcXVlIGVqZWN1dGEgbWFwYScpO1xuIl19
    </script>

    <!-- Google Maps Loader -->
    <script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => {
            await (a = m.createElement("script"));
            e.set("libraries", [...r] + "");
            for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
            e.set("callback", c + ".maps." + q);
            a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
            d[q] = f;
            a.onerror = () => h = n(Error(p + " could not load."));
            a.nonce = m.querySelector("script[nonce]")?.nonce || "";
            m.head.append(a);
        }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })({ key: "AIzaSyBaWEw0520633trSiLSlAj59WlWss9UGoo", v: "weekly" });
    </script>
    <?php
    return ob_get_clean(); 
}
add_shortcode('mostrar_mapa', 'mostrar_mapa_shortcode');