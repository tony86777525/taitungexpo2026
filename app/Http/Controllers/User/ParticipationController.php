<?php

namespace App\Http\Controllers\User;

use App\Enums\ProjectType;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    public function index(Request $request)
    {
        $projectCategories = ProjectCategory::query()
            ->whereHas('projects', function ($query) {
                $query
                    ->where('type', ProjectType::PRIVATE_SECTOR_PROJECT->value)
                    ->where('is_active', true);
            })
            ->get();

        $currentProjectCategoryId = $request->integer('project_category');

        $request->whenFilled('tag', function () use ($projectCategories, $currentProjectCategoryId) {
            abort_unless($projectCategories->contains('id', $currentProjectCategoryId), 404);
        });

        $projects = Project::query()
            ->with([
                'zone',
                'executingUnit',
            ])
            ->where('type', ProjectType::PRIVATE_SECTOR_PROJECT->value)
            ->where('is_active', true)
            ->when(!empty($currentProjectCategoryId), function ($query) use ($currentProjectCategoryId) {
                $query->whereHas('projectCategories', function ($query) use ($currentProjectCategoryId) {
                    $query->where('project_categories.id', $currentProjectCategoryId);
                });
            })
            ->orderBy('zone_id')
            ->orderBy('project_number')
            ->paginate(9)
            ->withQueryString()
            ->onEachSide(1);

        abort_if($projects->isEmpty(), 404);

        return view('user.participation.list', compact(
            'projects',
            'projectCategories',
            'currentProjectCategoryId'
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
                'projectCategories',
                'projectNatures',
//                'curationNatures',
//                'projectUnitTypes',
                'contents',
                'contents.images',
                'contents.links',
                'images',
            ])
            ->where('is_active', true)
            ->when(!empty($currentProjectId), function ($query) use ($currentProjectId) {
                $query->where('id', $currentProjectId);
            })
            ->first();

        abort_if(empty($project), 404);

        return view('user.participation.detail', compact(
            'project'
        ));
    }
}
