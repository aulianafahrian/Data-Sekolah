@extends('adminlte::page')

@section('title', 'Polyline')

@section('content_header')
<h1 class="m-0 text-dark">Polyline
</h1>
{{-- css --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
{{-- js --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<style>
    #map {
        height: 500px;
    }
</style>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <a href="{{ route('ats.index') }}" class="btn btn-primary" style="margin-bottom: 20px;">Kembali</a>
                <table class="table">
                    <tr>
                        <td><label for="InputLongitude">Longitude</label></td>
                        <td>:</td>
                        <td><input type="text" name="longitude" id="InputLongitude" placeholder="Masukkan longitude sekolah" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><label for="InputLatitude">Latitude</label></td>
                        <td>:</td>
                        <td><input type="text" name="latitude" id="InputLatitude" placeholder="Masukkan latitude sekolah" class="form-control" required></td>
                    </tr>
                    {{-- <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('sekolahs.index') }}" class="btn btn-default">Batal</a>
                    </td>

                    </tr> --}}

                </table>
                <div style="height: 400px;" id="map"></div>
            </div>
        </div>

    </div>

</div>

@stop

@push('js')
<script>
    var map = L.map('map').setView([-2.172217997240026, 115.41601091295428], 15);

    //googleMaps
    //Hybird: s,h

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    // Define a click event handler
    var marker;


    //pollyline

    var latlng = [
        [45.51, -122.68],
        [37.77, -122.43],
        [34.04, -118.2]
    ];
    var polyline = L.polyline(latlng, {
        color: 'red'
    }).addTo(map);

    var linearray = [];
    var polyline;
    map.on('click', function onMapClick(e) {
        longitude = e.latlng.lng;
        latitude = e.latlng.lat;
        document.getElementById('InputLatitude').value = latitude;
        document.getElementById('InputLongitude').value = longitude;
        linearray.push([latitude, longitude]);

        marker = L.marker(e.latlng).addTo(map);
        polyline = L.polyline(linearray, {
            color: 'red'
        }).addTo(map);
    });
    // Add a click event listener to the map
    map.on('click', onMapClick);
</script>

@endpush