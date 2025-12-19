<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Events;
use App\Models\Kuliner;
use App\Models\SpotFoto;
use Illuminate\Http\Request;

class BerandaController extends Controller
{

    public function index()
    {
        //
        $data_kuliner = Kuliner::all();
        $data_spot_foto = SpotFoto::all();
        $data_event = Events::all();
        $data_award = Award::all();
        return view('user.beranda', compact(['data_kuliner', 'data_spot_foto', 'data_event', 'data_award']));
    }

}
