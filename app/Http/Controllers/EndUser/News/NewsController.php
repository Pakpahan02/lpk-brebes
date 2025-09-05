<?php

namespace App\Http\Controllers\EndUser\News;

use App\Enums\NewsCategoryEnums;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $latestNews = News::latest()->first();

        $categories = NewsCategoryEnums::cases();

        $query = News::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $news = $query->where('id', '!=', $latestNews->id ?? null)
                      ->orderByDesc('created_at')
                      ->paginate(8);

        return view('end-user.news.index', [
            'news'       => $news,
            'latestNews' => $latestNews,
            'categories' => $categories,
        ]);
    }

    public function show(News $news)
    {
        return view('end-user.news.show', [
            'news' => $news,
        ]);
    }
}