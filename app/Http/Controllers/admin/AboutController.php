<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AboutFeature;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('about')->first();

        $features = AboutFeature::all();

        return view('admin.pages.about', compact('about', 'features'));
    }

    public function update(Request $request, $id)
    {
        $about = DB::table('about')->where('id', $id)->first();

        // upload image
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('storage/images/about'), $imageName);
        } else {

            $imageName = $about->image;
        }

        DB::table('about')
            ->where('id', $id)
            ->update([

                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'updated_at' => now(),

            ]);

        return redirect()->back()
            ->with('success', 'About berhasil diupdate');
    }
}
