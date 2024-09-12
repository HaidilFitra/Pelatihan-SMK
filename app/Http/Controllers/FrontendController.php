<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $about = about::all();
        return view('frontend.index',compact('about'));
    }
}
