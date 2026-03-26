<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;

class NewsController extends Controller
{
    public function index()
    {
        $articles = Article::query()
            ->with([
                'contents',
                'images',
                'tags',
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->paginate(9)
            ->onEachSide(1);

        abort_if($articles->isEmpty(), 404);

        return view('user.news.list', compact(
            'articles'
        ));
    }
}
