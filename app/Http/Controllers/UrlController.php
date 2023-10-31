<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        return view('url');
    }

    public function store(Request $request)
    {
        $url = new Url();
        $url->target_url = $request->target_url;
        $url->created_url = Str::random(6);
        $url->save();

        return redirect()->back();
    }
}
