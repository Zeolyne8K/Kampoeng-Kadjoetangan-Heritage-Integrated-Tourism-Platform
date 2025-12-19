<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    //
    public function show(string $id)  {
        $data = Award::findOrFail($id);
        $data_all = Award::all();
        return view('user.award', compact('data', 'data_all'));
    }
}
