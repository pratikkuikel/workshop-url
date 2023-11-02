<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function index()
    {
        $urls = Url::all();

        return view('url', compact('urls'));
    }

    public function store(Request $request)
    {
        $url = new Url();
        $url->target_url = $request->target_url;
        $url->created_url = Str::random(6);
        $url->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $url = Url::find($id);
        return view('url-edit', compact('url'));
    }

    public function update(Request $request, $id)
    {
        $url = Url::find($id);
        $url->target_url = $request->target_url;
        $url->save();

        return redirect()->route('urls');
    }

    public function delete($id)
    {
        $url = Url::find($id);
        $url->delete();

        return redirect()->route('urls');
    }

    public function redirect($url)
    {
        $record = Url::where('created_url', $url)->first();

        return redirect()->away($record->target_url);
    }
}
