var mymap = L.map('mapid').setView([49.072126, 17.382849], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2hpZnRvc3MiLCJhIjoiY2t1am5kZmdrMnpzZDMxbW9pZWFobmR6OSJ9.C6y5fhHhM8IkOcfPdnAjjA', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
}).addTo(mymap);