<?php

namespace App\Http\Controllers\Dashboard\CMS;

use App\Enums\NewsCategoryEnums;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.cms.news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = NewsCategoryEnums::cases();

        return view('dashboard.cms.news.form', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'category'    => ['required', 'string'],
                'title'       => ['required', 'string', 'max:50'],
                'description' => ['required', 'string'],
                'image'       => ['required', 'image', 'max:2048'],
            ]);

            $data['visible'] = $request->boolean('visible');

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('news', 'public');
            }

            News::create($data);

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = NewsCategoryEnums::cases();

        return view('dashboard.cms.news.form', [
            'news' => $news,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        try {
            $data = $request->validate([
                'category'    => ['required', 'string'],
                'title'       => ['required', 'string', 'max:50'],
                'description' => ['required', 'string'],
                'image'       => ['nullable', 'image', 'max:2048'],
            ]);

            $data['visible'] = $request->boolean('visible');

            if ($request->hasFile('image')) {
                if ($news->image && Storage::disk('public')->exists($news->image)) {
                    Storage::disk('public')->delete($news->image);
                }

                $data['image'] = $request->file('image')->store('news', 'public');
            }

            $news->update($data);

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        try {
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            $news->delete();

        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.cms.news.index')
                ->with('error', 'Terjadi kesalahan saat menghapus pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.cms.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
