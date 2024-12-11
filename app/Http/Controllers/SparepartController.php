<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SparepartController extends Controller
{
    // Menampilkan daftar spareparts
    public function index()
    {
        // Menggunakan pagination dengan 10 data per halaman
        $spareparts = Sparepart::paginate(10);

        // Mengembalikan view dengan data spareparts
        return view('spareparts.dashboard', compact('spareparts'));
    }

    // Menampilkan form untuk menambahkan sparepart
    public function create()
    {
        return view('spareparts.create');
    }
   


    // Menyimpan data sparepart ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sparepart_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        // Upload gambar
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads', 'public');
        }

        // Simpan data ke database
        Sparepart::create([
            'sparepart_name' => $validated['sparepart_name'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'photo' => $photoPath,
        ]);

        return redirect()->route('spareparts.dashboard')->with('success', 'Sparepart berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $sparepart = Sparepart::findOrFail($id);
        return view('spareparts.edit', compact('sparepart'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'sparepart_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $sparepart = Sparepart::findOrFail($id);
        $sparepart->sparepart_name = $request->sparepart_name;
        $sparepart->price = $request->price;
        $sparepart->description = $request->description;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($sparepart->photo && file_exists(storage_path('app/public/uploads/' . $sparepart->photo))) {
                unlink(storage_path('app/public/uploads/' . $sparepart->photo));
            }

            $photoPath = $request->file('photo')->store('uploads', 'public');
            $sparepart->photo = $photoPath;
        }

        $sparepart->save();

        return redirect()->route('spareparts.dashboard')->with('success', 'Sparepart berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $sparepart = Sparepart::findOrFail($id);

        // Hapus file foto dari storage jika ada
        if ($sparepart->photo && file_exists(storage_path('app/public/' . $sparepart->photo))) {
            unlink(storage_path('app/public/' . $sparepart->photo));
        }

        // Hapus data dari database
        $sparepart->delete();

        return redirect()->route('spareparts.dashboard')->with('success', 'Sparepart berhasil dihapus!');
    }

}
