<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    //
    public function show(string $id)  {
        $data = Kuliner::findOrFail($id);
        $date = $data->updated_at->format('d-m-Y');
        $data_all = Kuliner::all();
        return view('user.kuliner', compact(['data', 'date','data_all']));
    }
}
