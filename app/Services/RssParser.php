<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RssParser{
    private $feed;

    public function __construct($url)
    {
        $this->feed = $this->fetchRssFeed($url);
    }

    public function fetchRssFeed($url)
    {
        $response = Http::get($url);
        if($response->failed()){
            throw new \Exception("Failed to fetch RSS feed: " . $response->status());
        }

        $feed = simplexml_load_string($response->body());
        if(!$feed){
            throw new \Exception("Failed to parse RSS feed");
        }
        return $feed;
    }

    public function feed()
    {
        return $this->feed;
    }


    private function extractGoogleItem($item) : array {

        return [
            'description' => preg_replace('/(google)/i', "<span class=\"text-red-500\">$1</span>", htmlspecialchars($item->description)),
            'title' => preg_replace('/(google)/i', "<span class=\"text-red-500\">$1</span>", htmlspecialchars($item->title)),
            'link' => $item->link,
            'date' => $item->pubDate
        ];
    }

    public function getGoogleCount(){
        $count = 0;
        $formattedData = [];
        foreach ($this->feed->channel->item as $item) {
            if(str_contains(strtolower($item->description . $item->title), 'google')){
                $count += substr_count(strtolower($item->description . $item->title), 'google');
                $formattedData[] = $this->extractGoogleItem($item);
            }
        }
        return [
            'count' => $count,
            'data' => $formattedData
        ];
    }
}
