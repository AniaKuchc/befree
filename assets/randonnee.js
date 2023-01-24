let map = L.map("map").setView([43.610769, 3.876716], 12);
L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

document.addEventListener("DOMContentLoaded", function () {
  let jsDataMap = document.querySelector(".data-map");
  let data = JSON.parse(jsDataMap.dataset.coordinates);

  let newdata = "";
  for (var i = 0; i < data.length; i++) {
    if (!(data[i] == "\n" || data[i] == "\r")) newdata += data[i];
  }

  // Charger le GeoJSON
  let geojson = L.geoJson(JSON.parse(newdata));
  // Boucler à travers tous les points de coordonnées
  geojson.eachLayer(function (layer) {
    let latlngs = layer.getLatLngs();

    // Boucler à travers tous les points de coordonnées dans chaque géométrie
    for (let i = 0; i < latlngs.length; i++) {
      let latlng = latlngs[i];
      let latlng2 = latlngs[i + 1];
      // Inverser les coordonnées
      latlng.reverse();
    }

    let distanceRandonne = 0;

    for (let i = 0; i < latlngs.length; i++) {
      for (let a = 0; a < latlngs[i].length - 1; a++) {
        distanceRandonne += latlngs[i][a].distanceTo(latlngs[i][a + 1]);
      }
    }

    distanceArrondi = (distanceRandonne / 1000).toFixed(2);

    let distanceRandonneText = document.querySelector(".distanceRandonneText");
    distanceRandonneText.textContent = distanceArrondi;

    let polyline = L.polyline(latlngs, { color: "red" }).addTo(map);
    map.fitBounds(polyline.getBounds());
  });
});
