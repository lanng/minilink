<?php

namespace App\Services;

use App\Http\Requests\LinkStoreRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkService
{

    public function list()
    {
        $links = Link::where('user_id', auth()->user()->id)->get();
        return $links;
    }

    public function store(LinkStoreRequest $request)
    {
        $link_data['user_id'] = auth()->user()->id;
        $link_data['title'] = $request->title;
        $link_data['original_url'] = $request->url;
        $link_data['shortener_url'] = $this->getRandomUrl();

        $link = Link::create($link_data);
        return $link;
    }

    private function getRandomUrl(): string
    {
        $url = Str::random(5);
        while(Link::where('shortener_url', $url)->get() != '[]'){
            $url = Str::random(5);
        }

        return $url;
    }

    public function getOriginalUrl(Request $request)
    {
        $url = Link::where('shortener_url', $request->shortener_url)->get();
        if ($url != '[]'){
            return $url;
        }
        return '404';
    }
}
