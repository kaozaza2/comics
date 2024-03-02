<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Comic;
use http\Env\Request;
use Illuminate\Contracts\View\View as ViewContract;

class ComicReaderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(): ViewContract
    {
        $comics = Comic::query()->whereNotNull('published_at')->latest();

        return view(
            view: 'comic-browser',
            data: [
                'comics' => $comics->paginate(20),
            ],
        );
    }

    public function search(SearchRequest $request)
    {

    }

    public function reader(Comic $comic): ViewContract
    {
        return view(
            view: 'comic-reader',
            data: ['comic' => $comic],
        );
    }
}
