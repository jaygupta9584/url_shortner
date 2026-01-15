<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    /**
     * List short URLs based on role rules
     */
    public function index()
    {
        $urls = ShortUrl::where('user_id', auth()->id())->get();

        return view('short_urls.index', compact('urls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|string'
        ]);

        $url = $request->original_url;

        if (!preg_match('#^https?://#', $url)) {
            $url = 'https://' . ltrim($url, '/');
        }

        auth()->user()->shortUrls()->create([
            'original_url' => $url,
            'short_code' => Str::random(6)
        ]);

        return back()->with('success', 'Short URL created');
    }


}
