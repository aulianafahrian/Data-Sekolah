@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
<h1 class="m-0 text-dark">Data Sekolah</h1>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>{{$sekolahs->nama_sekolah}}</h3>
                <p>Alamat: {{ $sekolahs->alamat }}</p>
                <p>Kecamatan: {{ $sekolahs->kecamatan }}</p>
                <p dataLongitude="{{ $sekolahs->longitude }}">Longitude: {{ $sekolahs->longitude }}</p>
                <p dataLatitude="{{ $sekolahs->latitude }}">Latitude: {{ $sekolahs->latitude }}</p>
                <a href="{{ route('sekolahs.index') }}" class="btn btn-primary" style="margin-bottom: 20px;">Kembali</a>

                <div style="height: 400px;" id="map"></div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<!-- <script>
        var latitude = document.querySelector('p[dataLatitude]').getAttribute('dataLatitude');
        var longitude = document.querySelector('p[dataLongitude]').getAttribute('dataLongitude');

        var map = L.map('map').setView([latitude,longitude], 17);

        var marker = L.marker([latitude,longitude]).addTo(map);
        L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
    </script> -->
<script>
    var latitude = document.querySelector('p[dataLatitude]').getAttribute('dataLatitude');
    var longitude = document.querySelector('p[dataLongitude]').getAttribute('dataLongitude');
    var jenjang = '{{$sekolahs->jenjang}}'; // Sesuaikan dengan cara Anda mendapatkan jenjang
    var namaSekolah = '{{$sekolahs->nama_sekolah}}';

    var map = L.map('map').setView([latitude, longitude], 17);


    var marker = L.marker([latitude, longitude], {
        icon: L.icon({
            iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        })
    }).addTo(map);

    // Ubah warna marker sesuai jenjang
    marker.setIcon(L.icon({
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    }));

    // Menambahkan popup ke marker
    marker.bindPopup(`<b>${namaSekolah}</b><br>Jenjang: ${jenjang}`).openPopup();

    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);
</script>

@endpush