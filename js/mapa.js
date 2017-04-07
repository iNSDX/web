function initMap() {
    var estanco = {lat: 38.0213328, lng: -3.5027197};
    var map = new google.maps.Map(document.getElementById('map1'), {
      zoom: 16,
      center: estanco
    });
    var marker = new google.maps.Marker({
      position: estanco,
      map: map
    });
  }
