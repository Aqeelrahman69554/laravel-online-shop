<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::orderBy('created_at', 'desc')->get();
        return view('admin.pages.testimoni', compact('testimoni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'testimoni_name' => 'required|string|max:255',
            'testimoni_status' => 'required|string|max:255',
            'testimoni_desc' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'testimoni_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('testimoni_image')->store('testimoni', 'public');

        Testimoni::create([
            'testimoni_name' => $request->testimoni_name,
            'testimoni_status' => $request->testimoni_status,
            'testimoni_desc' => $request->testimoni_desc,
            'rating' => $request->rating,
            'testimoni_image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $item = Testimoni::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        if ($item->testimoni_image) {
            Storage::disk('public')->delete($item->testimoni_image);
        }

        $item->delete();
        return redirect()->back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
