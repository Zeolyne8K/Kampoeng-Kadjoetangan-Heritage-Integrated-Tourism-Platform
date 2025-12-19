<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Admin
     */
    public function index()  {
        $data = Feedback::select([
            'feedback_sender_name',
            'feedback_sender_email',
            'feedback_label',
            'feedback_message_type',
        ])->get();

        // Belum ada
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.feedback');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'feedback_sender_name' => 'required|string|max:100',
            'feedback_label' => 'required|string|max:100',
            'feedback_message_type' => 'required',
            'feedback_sender_email' => 'required|email|max:100',
            'feedback_sender_message' => 'required|string',
        ]);

        try {
            Feedback::create($validated);
        } catch (QueryException $e) {
            return redirect(route('user.feedback.create'))->with('error', 'Terjadi Kesalahan Koneksi');
        }
        return redirect(route('user.feedback.create'))->with('success', 'Pesan Terkirim! Terima kasih atas masukan Anda.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Feedback::findOrFail($id);

        // Belum ada
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
