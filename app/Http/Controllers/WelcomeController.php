<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
use Illuminate\Support\Facades\File;

class WelcomeController extends Controller
{
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

        return view('welcome', ['sekolahs' => $sekolahs, 'kecamatans' => $kecamatans]);

    }

    // Make sure to replace 'Sekolah' with the actual name of your model


}
