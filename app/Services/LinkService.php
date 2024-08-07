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
        $token = $this->getRandomUrl();
        $link_data['user_id'] = auth()->user()->id;
        $link_data['title'] = $request->title;
        $link_data['original_url'] = $request->url;
        $link_data['token'] = $token;
        $link_data['shortener_url'] = $request->getHttpHost() . '/' . $token;
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

    public function getOriginalUrl($shortenerUrl)
    {
        $url = Link::where('token', $shortenerUrl)->get();
        $link_data = $url[0];
        if ($url != '[]'){
            $link_data['clicks'] = $url[0]->clicks + 1;
            $url[0]->update($link_data->toArray());
            return $url;
        }
        return '404';
    }

    public function destroy(Link $link)
    {
        $link->delete();
        return $this->list();
    }
}
