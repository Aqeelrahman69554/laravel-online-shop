<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteStatistic;

class SiteStatisticController extends Controller
{
    public function index()
    {
        $statistics = SiteStatistic::all();
        // Pastikan namanya 'statistics' (pakai 's' di belakang)
        return view('admin.pages.sitestatistic', compact('statistics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:100',
        ]);

        SiteStatistic::create($request->all());

        return redirect()->back()->with('success', 'Statistik berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:100',
        ]);

        $stat = SiteStatistic::findOrFail($id);
        $stat->update($request->all());

        return redirect()->back()->with('success', 'Statistik berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $stat = SiteStatistic::findOrFail($id);
        $stat->delete();

        return redirect()->back()->with('success', 'Statistik berhasil dihapus!');
    }
}
