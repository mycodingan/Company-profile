<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        // Mengambil data company berdasarkan ID 1
        $company = Company::findOrFail(1);

        return view('company.index', compact('company'));
    }

    public function edit()
    {
        // Mengambil data company berdasarkan ID 1
        $company = Company::findOrFail(1);

        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'title' => 'required',
            'website_name' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ]);
    
        // Mengambil data company berdasarkan ID
        $company = Company::findOrFail($id);
    
        // Update data sesuai request yang diterima
        $company->update($request->only([
            'title',
            'website_name',
            'alamat',
            'nomor_telepon',
        ]));
    
        // Mengupdate logo jika ada
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->logo = $logoPath;
        }
    
        // Mengupdate favicon jika ada
        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->store('favicons', 'public');
            $company->favicon = $faviconPath;
        }
    
        // Simpan perubahan
        $company->save();
    
        return redirect()->route('company.index')
            ->with('success', 'Company berhasil diupdate');
    }
    
}
    