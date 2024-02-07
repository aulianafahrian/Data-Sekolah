@extends('adminlte::page')

@section('title', 'ATS 1214049')

@section('content_header')
<h1 class="m-0 text-dark">ATS 1214049</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <table class="table">
                    <tr>
                        <td><label>Polyline</label></td>
                        <td>:</td>
                        <td>
                            <a href="{{ route('polyline') }}" class="btn btn-warning">BUAT</a>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Polygon</label></td>
                        <td>:</td>
                        <td>
                            <a href="{{ route('polygon') }}" class="btn btn-warning">BUAT</a>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Circle</label></td>
                        <td>:</td>
                        <td>
                            <a href="{{ route('circle') }}" class="btn btn-warning">BUAT</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

</div>

@stop
