<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactController extends Controller
{
    // Menampilkan semua kontak
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    // Menampilkan form untuk membuat kontak baru
    public function create()
    {
        return view('contact.create');
    }

    // Menyimpan kontak baru ke database
// Menyimpan kontak baru ke database
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    $user = Auth::user();
    $emailData = [
        'name' => $request->input('name'),
        'email' => $user->email,
        'message' => $request->input('message')
    ];

    // Simpan data ke database
    Contact::create([
        'user_id' => $user->id,
        'name' => $emailData['name'],
        'email' => $emailData['email'],
        'message' => $emailData['message']
    ]);

    return redirect('/')->with('success', 'Contact created successfully!');
}


    // Menampilkan detail kontak
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    // Menampilkan form untuk mengedit kontak
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    // Menyimpan perubahan pada kontak ke database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update([
            'name' => $request->input('name'),
            'message' => $request->input('message')
        ]);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    // Menghapus kontak dari database
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
