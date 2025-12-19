<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Events;
use App\Models\Kuliner;
use App\Models\SpotFoto;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    
    public function index(string $table, Request $request)
    {
        $search = $request->query('search', '');
        $label = '';
        $perPage = 10;
        $data = collect();

        if ($table === 'kuliners') {
            $label = 'Kuliner';
            $query = Kuliner::query();
            
            if ($search) {
                $query->where('nama_kuliner', 'like', '%' . $search . '%')
                      ->orWhere('jenis_kuliner', 'like', '%' . $search . '%');
            }
            
            $data = $query->paginate($perPage);

        } elseif ($table === 'spot_fotos') {
            $label = 'Spot Foto';
            $query = SpotFoto::query();
            
            if ($search) {
                $query->where('nama_spot_foto', 'like', '%' . $search . '%')
                      ->orWhere('jenis_spot_foto', 'like', '%' . $search . '%');
            }
            
            $data = $query->paginate($perPage);

        } elseif ($table === 'events') {
            $label = 'Event';
            $query = Events::query();
            
            if ($search) {
                $query->where('nama_event', 'like', '%' . $search . '%')
                      ->orWhere('jenis_event', 'like', '%' . $search . '%');
            }
            
            $data = $query->paginate($perPage);

        } elseif ($table === 'awards') {
            $label = 'Penghargaan';
            $query = Award::query();
            
            if ($search) {
                $query->where('nama_award', 'like', '%' . $search . '%')
                      ->orWhere('jenis_award', 'like', '%' . $search . '%');
            }
            
            $data = $query->paginate($perPage);

        } else {
            
            $label = 'Kuliner';
            $data = Kuliner::paginate($perPage);
        }

        return view('user.katalog', compact('data', 'label'));
    }
}
