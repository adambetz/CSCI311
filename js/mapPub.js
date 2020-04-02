function initMap(){
  var options = {
    zoom:16,
    center:{lat:49.1576,lng:-123.9670}
  }
  var map = new google.maps.Map(document.getElementById('map'), {
  options,
  styles: [
        {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
        {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
        {
          featureType: 'administrative.locality',
          elementType: 'labels.text.fill',
          stylers: [{color: '#d59563'}]
        },
        {
          featureType: 'poi',
          elementType: 'labels.text.fill',
          stylers: [{color: '#d59563'}]
        },
        {
          featureType: 'poi.park',
          elementType: 'geometry',
          stylers: [{color: '#263c3f'}]
        },
        {
          featureType: 'poi.park',
          elementType: 'labels.text.fill',
          stylers: [{color: '#6b9a76'}]
        },
        {
          featureType: 'road',
          elementType: 'geometry',
          stylers: [{color: '#38414e'}]
        },
        {
          featureType: 'road',
          elementType: 'geometry.stroke',
          stylers: [{color: '#212a37'}]
        },
        {
          featureType: 'road',
          elementType: 'labels.text.fill',
          stylers: [{color: '#9ca5b3'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry',
          stylers: [{color: '#746855'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'geometry.stroke',
          stylers: [{color: '#1f2835'}]
        },
        {
          featureType: 'road.highway',
          elementType: 'labels.text.fill',
          stylers: [{color: '#f3d19c'}]
        },
        {
          featureType: 'transit',
          elementType: 'geometry',
          stylers: [{color: '#2f3948'}]
        },
        {
          featureType: 'transit.station',
          elementType: 'labels.text.fill',
          stylers: [{color: '#d59563'}]
        },
        {
          featureType: 'water',
          elementType: 'geometry',
          stylers: [{color: '#17263c'}]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.fill',
          stylers: [{color: '#515c6d'}]
        },
        {
          featureType: 'water',
          elementType: 'labels.text.stroke',
          stylers: [{color: '#17263c'}]
        },
        {
          featureType: 'poi.business',
          stylers: [{visibility: 'off'}]
        },
        {
          featureType: 'transit',
          elementType: 'labels.icon',
          stylers: [{visibility: 'off'}]
        }
      ]});
      var markerResidence = new google.maps.Marker({
        position: {lat:49.158956, lng:-123.967322},
        map: map
      });
      var residenceInfoWindow = new google.maps.InfoWindow({
        content: "<p>Go to the Residence!</p>"
      });
      markerResidence.addListener('click', function() {
        window.location.href = "./residency.php";
      });
      markerResidence.addListener('mouseover', function() {
        residenceInfoWindow.open(map, markerResidence);
      });
      markerResidence.addListener('mouseout', function(){
        residenceInfoWindow.close();
      });
      var markerGym = new google.maps.Marker({
        position: {lat:49.1576,lng:-123.9648},
        map: map
      });
      var gymInfoWindow = new google.maps.InfoWindow({
        content: "<p>Go to the Gym!</p>"
      });
      markerGym.addListener('click', function() {
        window.location.href = "./gym.php";
      });
      markerGym.addListener('mouseover', function() {
        gymInfoWindow.open(map, markerGym);
      });
      markerGym.addListener('mouseout', function(){
        gymInfoWindow.close();
      });
      var markerClassroom = new google.maps.Marker({
        position: {lat:49.1569,lng:-123.9678},
        map: map
      });
      var classroomInfoWindow = new google.maps.InfoWindow({
        content: "<p>Go to the Classroom!</p>"
      });
      markerClassroom.addListener('click', function() {
        window.location.href = "./classroom.php";
      });
      markerClassroom.addListener('mouseover', function() {
        classroomInfoWindow.open(map, markerClassroom);
      });
      markerClassroom.addListener('mouseout', function(){
        classroomInfoWindow.close();
      });
}
