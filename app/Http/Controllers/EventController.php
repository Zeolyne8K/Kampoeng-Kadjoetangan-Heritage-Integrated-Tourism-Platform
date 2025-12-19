<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function show(string $id)  {
        $data = Events::findOrFail($id);
        $data_all = Events::all();
        return view('user.event', compact('data', 'data_all'));
    }
}
