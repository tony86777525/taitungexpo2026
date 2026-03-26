<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ActivitySession;
use App\Models\Article;
use Carbon\Carbon;

class IndexController extends Controller
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
            ->limit(12)
            ->get();

        $activitySessions = ActivitySession::query()
            ->with([
                'activity',
                'activity.project',
                'activity.project.projectNatures'
            ])
            ->where('is_active', true)
            ->where('date', Carbon::today())
            ->orderBy('sort_order')
            ->get();

        return view('user.index', compact(
            'articles',
            'activitySessions'
        ));
    }
}
