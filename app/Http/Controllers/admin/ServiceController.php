<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.pages.service', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'service_name' => 'required|string|max:255',
            'service_desc' => 'required|string',
        ]);

        Service::create($request->all());

        return redirect()->back()->with('success', 'Service berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string',
            'service_name' => 'required|string|max:255',
            'service_desc' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update($request->all());

        return redirect()->back()->with('success', 'Service berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Service berhasil dihapus!');
    }
}
