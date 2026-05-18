<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service2;

class Service2Controller extends Controller
{
    public function index()
    {
        $service2 = Service2::all();

        return view('admin.pages.service2', compact('service2'));
    }

    public function store(Request $request)
    {
        Service2::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'value' => $request->value,
        ]);

        return back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $service2 = Service2::findOrFail($id);

        $service2->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'value' => $request->value,
        ]);

        return back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $service2 = Service2::findOrFail($id);

        $service2->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
