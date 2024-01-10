@extends('layouts.app', ['page' => __('House'), 'pageSlug' => 'rumah'])

@section('content')
<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        height: 400px;
        width: 100%;
      }
      h1 {
        color: #fff;
        font-size: 24px;
        font-weight: 200;
        text-align: left;
        margin-top: 0;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script>
      function initMap() {
        var location = { lat: {{ $location['lat'] }}, lng: {{ $location['lng'] }} }; 
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: location
        });
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
      }
    </script>
  </head>
  <body>
    <h1>House Location</h1>
    <div id="map"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>
  </body>
</html>
@endsection
