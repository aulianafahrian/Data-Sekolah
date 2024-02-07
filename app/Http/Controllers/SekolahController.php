<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use Illuminate\Support\Facades\File;


class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sekolahs = Sekolah::all();
    

        return view('sekolahs.index', [
            'sekolahs' => $sekolahs,
    
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sekolah $request)
    {
        $jsonFilePath = resource_path('json/kecamatan.json');
        $kecamatans = json_decode(File::get($jsonFilePath), true);

        return view('sekolahs.create', [
            'sekolahs' => $request,
            'kecamatans' => $kecamatans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "<script>console.log('Debug Objects: " . $request->nama_sekolah . "' );</script>";
        $sekolah = new Sekolah;
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->jenjang = $request->jenjang;
        $sekolah->alamat = $request->alamat;
        $sekolah->kecamatan = $request->kecamatan;
        $sekolah->longitude = $request->longitude;
        $sekolah->latitude = $request->latitude;
        $sekolah->save();

        return redirect()->route('sekolahs.index')->with('success', 'Data Sekolah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $sekolah = Sekolah::findOrFail($id);
        return view('sekolahs.show', [
            'sekolahs' => $sekolah
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $jsonFilePath = resource_path('json/kecamatan.json');
        $kecamatans = json_decode(File::get($jsonFilePath), true);

        return view('sekolahs.edit', [
            'sekolahs' => $sekolah,
            'kecamatans' => $kecamatans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->nama_sekolah = $request->nama_sekolah;
        $sekolah->jenjang = $request->jenjang;
        $sekolah->alamat = $request->alamat;
        $sekolah->kecamatan = $request->kecamatan;
        $sekolah->latitude = $request->latitude;
        $sekolah->longitude = $request->longitude;
        $sekolah->save();

        return redirect()->route('sekolahs.index')->with('success', 'Data Sekolah Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();

        return redirect()->route('sekolahs.index')->with('success', 'Data Sekolah Berhasil Dihapus');
    }
}
