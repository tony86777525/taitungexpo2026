<?php

namespace App\Http\Controllers\User;

use App\Enums\ProjectType;
use App\Enums\ZoneCode;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Zone;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index(Request $request)
    {
        $currentZoneId = $request->integer('zone');

        $zones = Zone::query()
            ->select('zones.*')
            ->whereHas('projects', function ($query) {
                $query
                    ->where('is_active', true)
                    ->where('type', ProjectType::EXHIBITION_OVERVIEW);
            })
            ->where('zones.is_active', true)
            ->where('zones.is_only_activity', false)
            ->get();

        $exhibitionOverviewProjects = collect();

        if (!empty($zones)) {
            if (empty($currentZoneId)) {
                $currentZoneId = $zones->first()->id;
            }

            $request->whenFilled('zone', function () use ($zones, $currentZoneId) {
                // 使用 contains 檢查 ID 存在性，比 firstWhere 效能更好且語意更強
                abort_unless($zones->contains('id', $currentZoneId), 404);
            });

            $exhibitionOverviewProjects = Project::query()
                ->with([
                    'zone',
                    'curationNatures'
                ])
                ->where('type', ProjectType::EXHIBITION_OVERVIEW)
                ->where('is_active', true)
                ->where('zone_id', $currentZoneId)
                ->orderBy('zone_id')
                ->orderBy('project_number')
                ->get();

            abort_if(empty($exhibitionOverviewProjects), 404);
        }

        $eventProjects = Project::query()
            ->with([
                'zone',
                'curationNatures'
            ])
            ->whereHas('zone', function ($query) {
                $query->where('code', ZoneCode::EVENT);
            })
            ->where('is_active', true)
            ->get();

        return view('user.about.overview.list', compact(
            'zones',
            'exhibitionOverviewProjects',
            'currentZoneId',
            'eventProjects',
        ));
    }

    public function detail(int $id)
    {
        $currentProjectId = $id;

        $project = Project::query()
            ->with([
                'zone',
                'executingUnit',
                'featuredImages',
                'projectNatures',
                'curationNatures',
                'projectUnitTypes',
                'contents',
                'contents.images',
                'contents.links',
                'images',
                'projectUnitTypes',
                'projectUnitTypes.units',
            ])
            ->where('is_active', true)
            ->when(!empty($currentProjectId), function ($query) use ($currentProjectId) {
                $query->where('id', $currentProjectId);
            })
            ->first();

        abort_if(empty($project), 404);

        return view('user.about.overview.detail', compact(
            'project'
        ));
    }
}
