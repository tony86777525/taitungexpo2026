<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
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

        $activities = Activity::query()
            ->with([
                'project',
                'project.projectNatures'
            ])
            ->where('is_active', true)
            ->where('activity_start_date', '<', Carbon::today())
            ->where('activity_end_date', '>', Carbon::today())
            ->orderBy('sort_order')
            ->get();

        return view('user.index', compact(
            'articles',
            'activities'
        ));
    }
}
