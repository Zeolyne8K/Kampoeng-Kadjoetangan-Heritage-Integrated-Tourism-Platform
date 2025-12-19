<?php

namespace App\Http\Controllers;

use App\Models\SpotFoto;
use Illuminate\Http\Request;

class SpotFotoController extends Controller
{
    //
    public function show(string $id)  {
        $data = SpotFoto::findOrFail($id);
        $date = $data->updated_at->format('d-m-Y');

        $data_all = SpotFoto::all();
        return view('user.spot-foto', compact(['data', 'date', 'data_all']));
    }
}
