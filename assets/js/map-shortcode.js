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
        zoom: 7,
        center: { lat: 37.5246323, lng: -77.575662 },
        mapId: "428d46b9bd6e05b7",
    });
    const infoWindow = new google.maps.InfoWindow({
        content: "",
        disableAutoPan: true,
    });

    // Add some markers to the map.
    const markers = locations.map((position, i) => {
        if (position.lat !== 0 && position.lng !== 0) { }
        const label = ".";
        const pinGlyph = new google.maps.marker.PinElement({
            glyph: label,
            glyphColor: "#1675a9",
            background: "#1675a9",
            borderColor: "#1675a9",
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
            div.style.backgroundColor = count > 50 ? "#1675a9" : count > 10 ? "#1675a9" : "#1675a9";
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