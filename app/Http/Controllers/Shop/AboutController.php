<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\About;
use App\Models\AboutFeature;

class AboutController extends Controller
{
    public function index(){
        $about = About::first();
        $features = AboutFeature::all();
        return view('shop.pages.about', compact('about','features'));
    }


}
