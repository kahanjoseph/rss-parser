<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RssParser;

class DashboardController extends Controller
{
    /**
     * Show the welcome page.
     */
    public function index()
    {
        $rssParser = new RssParser('http://feeds.seroundtable.com/SearchEngineRoundtable1');
        $googleCount = $rssParser->getGoogleCount();

        return view('welcome', [
            'googleCount' => $googleCount['count'],
            'formattedData' => $googleCount['data']
        ]);
    }
}
