@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
<h1 class="m-0 text-dark">Data Sekolah</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-tools">
                <div class="card-body">
                    <a href="{{route('sekolahs.create')}}" class="btn btn-primary">Tambah</a>
                    <br><br>
                    <table class="table table-hover table-bordered table-striped" id="exemple2">
                        <thead>
                            <tr>
                                <th>Nama Sekolah</th>
                                <th>Jenjang</th>
                                <th>Alamat Sekolah</th>
                                <th>Kecamatan</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sekolahs as $key => $sekolah)
                            <tr>
                                <td>{{ $sekolah->nama_sekolah }}</td>
                                <td>{{ $sekolah->jenjang }}</td>
                                <td>{{ $sekolah->alamat }}</td>
                                <td>{{ $sekolah->kecamatan }}</td>
                                <td>{{ $sekolah->latitude }}</td>
                                <td>{{ $sekolah->longitude }}</td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('sekolahs.show', $sekolah->id) }}" class="btn btn-primary mr-2 px-2">Lihat</a>
                                        <a href="{{ route('sekolahs.edit', $sekolah->id) }}" class="btn btn-warning mr-2 px-2">Edit</a>
                                        <form action="{{ route('sekolahs.destroy', $sekolah->id) }}" id="formdelete{{ $sekolah->id }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger px-2" onclick="confirmDelete('{{ $sekolah->id }}')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
<script>
    function confirmDelete(id) {
        if (confirm('Anda yakin ingin menghapus sekolah ini?')) {
            document.getElementById('formdelete' + id).submit();
        }
    }
</script>