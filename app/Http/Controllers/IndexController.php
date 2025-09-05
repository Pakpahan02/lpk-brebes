<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\FQA;
use App\Models\News;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $banners = Banner::query()
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        $news = News::query()
            ->orderByDesc('created_at')
            ->limit(8)
            ->get();

        $fqas = FQA::query()
            ->orderBy('id')
            ->get();

        return view('welcome', [
            'banners' => $banners,
            'news' => $news,
            'fqas' => $fqas,
        ]);
    }
}
