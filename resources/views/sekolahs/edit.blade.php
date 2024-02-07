@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Data Sekolah</h1>
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
<form action="{{route('sekolahs.update', $sekolahs->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><label for="InputNamaSekolah">Nama Sekolah</label></td>
                            <td>:</td>
                            <td><input type="text" name="nama_sekolah" id="InputNamaSekolah" class="form-control" required value="{{ $sekolahs->nama_sekolah }}"></td>
                        </tr>
                        <tr>
                            <td><label for="InputJenjang">Jenjang</label></td>
                            <td>:</td>
                            <td>
                                <select name="jenjang" id="InputJenjang" class="form-control" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    <option value="SD" {{ $sekolahs->jenjang == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ $sekolahs->jenjang == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ $sekolahs->jenjang == 'SMA' ? 'selected' : '' }}>SMA</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="InputAlamat">Alamat</label></td>
                            <td>:</td>
                            <td><input type="text" name="alamat" id="InputAlamat" class="form-control" value="{{ $sekolahs->alamat }}" required></td>
                        </tr>
                        <tr>
                            <td><label for="InputKecamatan">Kecamatan</label></td>
                            <td>:</td>
                            <td>
                                <select name="kecamatan" id="InputKecamatan" class="form-control" required>
                                    <option value="{{ $sekolahs->kecamatan }}">{{ $sekolahs->kecamatan }}</option>
                                    @if ($kecamatans)
                                    @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan['kecamatan'] }}">{{ $kecamatan['kecamatan'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="InputLatitude">Latitude</label></td>
                            <td>:</td>
                            <td><input type="text" name="latitude" id="InputLatitude" class="form-control" value="{{ $sekolahs->latitude }}" required></td>
                        </tr>
                        <tr>
                            <td><label for="InputLongitude">Longitude</label></td>
                            <td>:</td>
                            <td><input type="text" name="longitude" id="InputLongitude" class="form-control" value="{{ $sekolahs->longitude }}" required></td>
                        </tr>
                    </table>
                    <div style="height: 400px;" id="map"></div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('sekolahs.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
@stop

@push('js')
<script>
    var map = L.map('map').setView([{{ $sekolahs->latitude }}, {{ $sekolahs->longitude }}], 15);

L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
}).addTo(map);

var marker = L.marker([{{ $sekolahs->latitude }}, {{ $sekolahs->longitude }}]).addTo(map)
    .bindPopup("Nama Sekolah: {{ $sekolahs->nama_sekolah }}<br>Koordinat: {{ $sekolahs->latitude }}, {{ $sekolahs->longitude }}")
    .openPopup();

    function onMapClick(e) {
        document.getElementById('InputLatitude').value = e.latlng.lat;
        document.getElementById('InputLongitude').value = e.latlng.lng;

        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker(e.latlng).addTo(map)
            .bindPopup("Nama Sekolah: {{ $sekolahs->nama_sekolah }}<br>Koordinat: " + e.latlng.toString())
            .openPopup();

        marker.on('click', function(e) {
            map.removeLayer(marker);
            document.getElementById('InputLatitude').value = null;
            document.getElementById('InputLongitude').value = null;
        });
    }

    map.on('click', onMapClick);

    var Kecamatan = @json($kecamatans);
    console.log(Kecamatan);
    let DataKecamatan = document.getElementById('InputKecamatan'); // Corrected ID here
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