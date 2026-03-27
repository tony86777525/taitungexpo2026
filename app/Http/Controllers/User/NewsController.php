<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        // 取得所有已啟用文章所關聯的 Tag (用於顯示篩選選單)
        $tags = Tag::query()
            ->whereHas('articles', function ($q) {
                $q->where('is_active', true);
            })
            ->get();

        $currentTagId = $request->integer('tag');

        $request->whenFilled('tag', function () use ($tags, $currentTagId) {
            // 使用 contains 檢查 ID 存在性，比 firstWhere 效能更好且語意更強
            abort_unless($tags->contains('id', $currentTagId), 404);
        });

        $articles = Article::query()
            ->with([
                'contents',
            ])
            ->where('is_active', true)
            ->when(!empty($currentTagId), function ($query) use ($currentTagId) {
                $query->whereHas('tags', function ($query) use ($currentTagId) {
                    $query->where('tags.id', $currentTagId);
                });
            })
            ->orderBy('sort_order')
            ->paginate(9)
            ->withQueryString()
            ->onEachSide(1);

        return view('user.news.list', compact(
            'articles',
            'tags',
            'currentTagId'
        ));
    }
}
