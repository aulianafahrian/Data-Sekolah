<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sekolahs = Sekolah::all();
        $jsonFilePath = resource_path('json/kecamatan.json');
        $kecamatans = json_decode(File::get($jsonFilePath), true);

        return view('home', ['sekolahs' => $sekolahs, 'kecamatans' => $kecamatans]);

    }

    // Make sure to replace 'Sekolah' with the actual name of your model


}
