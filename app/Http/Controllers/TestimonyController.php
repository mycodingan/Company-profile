<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::all();
        return view('testimony.index', compact('testimonies'));
    }

    public function create()
    {
        return view('testimony.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pengisi' => 'required|max:255',
            'tanggal_mengisi' => 'required|date',
            'isi' => 'required',
        ]);

        Testimony::create($validatedData);

        return redirect()->route('testimony.index')->with('success', 'Testimony created successfully.');
    }

    public function edit(Testimony $testimony)
    {
        return view('testimony.edit', compact('testimony'));
    }

    public function update(Request $request, Testimony $testimony)
    {
        $validatedData = $request->validate([
            'nama_pengisi' => 'required|max:255',
            'tanggal_mengisi' => 'required|date',
            'isi' => 'required',
        ]);

        $testimony->update($validatedData);

        return redirect()->route('testimony.index')->with('success', 'Testimony updated successfully.');
    }

    public function destroy(Testimony $testimony)
    {
        $testimony->delete();

        return redirect()->route('testimony.index')->with('success', 'Testimony deleted successfully.');
    }
}
