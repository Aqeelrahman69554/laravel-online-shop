<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('admin.pages.home', compact('homes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'home_title' => 'required|string|max:255',
            'home_image' => 'required|image|mimes:jpg,png|max:2048',
        ]);


        $imagePath = $request->file('home_image')->store('images/home/', 'public');

        Home::create([
            'home_title' => $request->home_title,
            'home_image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'home_title' => 'required|string|max:255',
            'home_image' => 'nullable|image|mimes:jpg,png|max:2048', // Ubah ke nullable
        ]);

        $home = Home::findOrFail($id);
        $home->home_title = $request->home_title; // Pastikan judul juga diupdate

        if ($request->hasFile('home_image')) {
            // Hapus gambar lama jika ada
            if ($home->home_image) {
                Storage::disk('public')->delete($home->home_image);
            }
            $imagePath = $request->file('home_image')->store('images/home', 'public');
            $home->home_image = $imagePath;
        }

        $home->save(); // PENTING: Simpan perubahan ke database

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // CARI datanya
        $home = Home::findOrFail($id);

        // HAPUS FISIK: Singkirkan gambar dari gudang
        if ($home->home_image) {
            Storage::disk('public')->delete($home->home_image);
        }

        // HAPUS CATATAN: Hapus baris data dari database
        $home->delete();

        return redirect()->back()->with('success', 'Berhasil dihapus!');
    }
}
