<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    public function index()  {
        $data = AboutUs::first();
        return view('user.us', compact('data'));
    }
}
