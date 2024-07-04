<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkStoreRequest;
use App\Models\Link;
use App\Services\LinkService;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Termwind\Components\Li;

class UrlController extends Controller
{
    public function __construct(protected LinkService $linkService)
    {}

    public function index()
    {
        $links = $this->linkService->list();
        return view('dashboard', ['links' => $links]);
    }

    public function store(LinkStoreRequest $request)
    {
        $link = $this->linkService->store($request);
        return view('create-link', ['link' => 'localhost/' . $link->shortener_url]);
    }
    public function shortUrl(Request $request)
    {
        $url = $this->linkService->getOriginalUrl($request);
        if ($url != '404'){
            return redirect($url[0]->original_url);
        }
        return view('not-found', ['redirect_error' => 'Link incorreto']);
    }

    public function destroy(Link $link)
    {
        $urls = $this->linkService->destroy($link);
        return view('dashboard', ['links' => $urls, 'message' => 'MiniLink deletado!']);
    }
}
