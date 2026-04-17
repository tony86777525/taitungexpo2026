<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Brand;
use App\Models\BrandTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brandTags = BrandTag::query()
            ->whereHas('brands', function ($q) {
                $q->where('is_active', true);
            })
            ->get();

        $currentBrandTagId = $request->integer('brand_tag');

        $request->whenFilled('tag', function () use ($brandTags, $currentBrandTagId) {
            // 使用 contains 檢查 ID 存在性，比 firstWhere 效能更好且語意更強
            abort_unless($brandTags->contains('id', $currentBrandTagId), 404);
        });

        $brands = Brand::query()
            ->where('is_active', true)
            ->when(!empty($currentBrandTagId), function ($query) use ($currentBrandTagId) {
                $query->whereHas('tags', function ($query) use ($currentBrandTagId) {
                    $query->where('brand_tags.id', $currentBrandTagId);
                });
            })
            ->orderBy('sort_order')
            ->paginate(1)
            ->withQueryString()
            ->onEachSide(1);

        return view('user.brand.list', compact(
            'brands',
            'brandTags',
            'currentBrandTagId'
        ));
    }

    public function detail(int $id)
    {
        $currentBrandTagId = $id;

        $brand = Brand::query()
            ->with([
                'tags',
                'links',
                'contents',
                'contents.images',
                'contents.links',
                'images',
            ])
            ->where('is_active', true)
            ->when(!empty($currentBrandTagId), function ($query) use ($currentBrandTagId) {
                $query->where('id', $currentBrandTagId);
            })
            ->first();

        abort_if(empty($brand), 404);

        return view('user.brand.detail', compact(
            'brand'
        ));
    }
}
