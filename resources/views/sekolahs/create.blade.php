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
<form action="{{route('sekolahs.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td><label for="InputNamaSekolah">Nama Sekolah</label></td>
                            <td>:</td>
                            <td><input type="text" name="nama_sekolah" id="InputNamaSekolah" placeholder="Masukkan nama sekolah" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="InputJenjang">Jenjang</label></td>
                            <td>:</td>
                            <td>
                                <select name="jenjang" id="InputJenjang" class="form-control" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="InputAlamat">Alamat</label></td>
                            <td>:</td>
                            <td><input type="text" name="alamat" id="InputAlamat" placeholder="Masukkan alamat sekolah" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="InputKecamatan">Kecamatan</label></td>
                            <td>:</td>
                            <td>
                                <select name="kecamatan" id="InputKecamatan" class="form-control" required>
                                    <option value="">Pilih Kecamatan</option>
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
                            <td><input type="text" name="latitude" id="InputLatitude" placeholder="Masukkan latitude sekolah" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="InputLongitude">Longitude</label></td>
                            <td>:</td>
                            <td><input type="text" name="longitude" id="InputLongitude" placeholder="Masukkan longitude sekolah" class="form-control" required></td>
                        </tr>
                        {{-- <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('sekolahs.index') }}" class="btn btn-default">Batal</a>
                        </td>

                        </tr> --}}

                    </table>
                    <div style="height: 400px;" id="map"></div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('sekolahs.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
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

    function onMapClick(e) {
        // alert("Latitude: " + e.latlng.lat + "\nLongitude: " + e.latlng.lng);
        document.getElementById('InputLatitude').value = e.latlng.lat;
        document.getElementById('InputLongitude').value = e.latlng.lng;

        if (marker) {
            map.removeLayer(marker);
        }

        marker = L.marker(e.latlng).addTo(map)
            .bindPopup("Koordinat: " + e.latlng.toString())
            .openPopup();

        marker.on('click', function(e) {
            map.removeLayer(marker);
            document.getElementById('InputLatitude').value = null;
            document.getElementById('InputLongitude').value = null;
        });
    }
    // Add a click event listener to the map
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