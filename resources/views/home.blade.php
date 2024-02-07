@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Data Sekolah Kabupaten Tabalong</h1>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
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
                <div class="navbar">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('sekolahs.create') }}">Tambah</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Jenjang</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">SD</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">SMP</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">SMA</a>
                            </div>
                        </li>
                        <div class="pr-3" style="width: 150px">
                            <select class="custom-select" id="pilihkecamatan">
                                <option value="">Pilih Kecamatan</option>
                                @if ($kecamatans)
                                @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan['kecamatan'] }}">{{ $kecamatan['kecamatan'] }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="pr-3" style="width: 150px">
                            <select class="custom-select" id="pilihmap">
                                <option selected value="street">Street</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="satellite">Satellite</option>
                                <option value="terrain">Terrain</option>
                            </select>
                        </div>
                    </ul>
                </div>
                <div class="mt-3" style="height: 400px;" id="map"></div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')

<script>
    // Script Peta
    let coordinateArray = [-2.1719983923537263, 115.41368420623023];
    var map = L.map('map').setView(coordinateArray, 17);

    const pilihmap = document.getElementById('pilihmap');

    var baseLayer = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);

    pilihmap.addEventListener("change", () => {
        let mapvalue = pilihmap.value;
        var lyrs = '';
        if (mapvalue == 'street') {
            lyrs = 'm';
        }
        if (mapvalue == 'hybrid') {
            lyrs = 's,h';
        }
        if (mapvalue == 'satellite') {
            lyrs = 's';
        }
        if (mapvalue == 'terrain') {
            lyrs = 'p';
        }
        baseLayer.setUrl('http://{s}.google.com/vt?lyrs=' + lyrs + '&x={x}&y={y}&z={z}');
    });

    const hideStyle = {
        opacity: 0,
        fillOpacity: 0
    };

    const sekolahs = @json($sekolahs);
    sekolahs.forEach(function(sekolah) {
        L.marker([sekolah.latitude, sekolah.longitude]).addTo(map)
            .bindPopup('<b>' + sekolah.nama_sekolah + '</b><br>' + sekolah.kecamatan);
    });


    var Kecamatan = @json($kecamatans);
    console.log(Kecamatan);

    let DataKecamatan = document.getElementById('pilihkecamatan');
    if (DataKecamatan) {
        DataKecamatan.addEventListener('change', function() {
            let selectedKecamatan = this.value;
            let data = Kecamatan.filter(function(item) {
                return item.kecamatan === selectedKecamatan;
            });

            if (data && data.length > 0) {
                console.log(data);
                let coordinateArray = [data[0].lat, data[0].long];
                // Assume 'map' is the variable containing your map object
                map.setView(coordinateArray, 15);
            } else {
                console.error('Data kecamatan tidak ditemukan.');
            }
        });
    }
</script>

@endpush