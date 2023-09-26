var map;
console.log(markers);

function loadMapScenario() {

        map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
        center: new Microsoft.Maps.Location(46.826463, 17.692785),
        zoom: 10
    });

    var searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('input', function () {
        searchMarkers(searchInput.value.toLowerCase());
    });

    addMarkers(markers);
}


function addMarkers(markers) {
    markers.forEach(function (marker) {
        var pin = new Microsoft.Maps.Pushpin(marker.location, { title: marker.title });
        pin.metadata = {
            description: marker.description
        };
        Microsoft.Maps.Events.addHandler(pin, 'click', function () {
            showInfo(marker);
        });
        map.entities.push(pin);
    });
}

function showInfo(marker) {
    var infoDiv = document.getElementById('infoDiv');
    infoDiv.innerHTML = '<h2>Hely: ' + marker.title + '</h2><p><b>Leírás</b>: ' + marker.description + '</p>';
}

function searchMarkers() {
    var searchTerm = document.getElementById('searchInput').value.toLowerCase();
    map.entities.clear();

    if (searchTerm === "") {
        addMarkers(markers);
    } else {
        var matchingMarkers = markers.filter(function (marker) {
            return marker.title.toLowerCase().includes(searchTerm) || marker.description.toLowerCase().includes(searchTerm);
        });

        addMarkers(matchingMarkers);
    }
}
