<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutFeature;

class AboutFeatureController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'icon' => 'required',
            'sub_feature' => 'required',
            'desc_feature' => 'required',
        ]);

        AboutFeature::create([
            'icon' => $request->icon,
            'sub_feature' => $request->sub_feature,
            'desc_feature' => $request->desc_feature,
        ]);

        return redirect()->back()->with('success', 'Feature berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $feature = AboutFeature::find($id);

        $feature->delete();

        return redirect()->back()
            ->with('success', 'Feature Berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $feature = AboutFeature::find($id);

        $feature->update([

            'icon' => $request->icon,
            'sub_feature' => $request->sub_feature,
            'desc_feature' => $request->desc_feature,

        ]);

        return redirect()->back()
            ->with('success', 'Feature berhasil diupdate');
    }
}
