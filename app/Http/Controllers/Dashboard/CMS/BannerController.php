<?php

namespace App\Http\Controllers\Dashboard\CMS;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.cms.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.cms.banner.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title'       => ['required', 'string', 'max:40'],
                'description' => ['required', 'string', 'max:100'],
                'link'        => ['required', 'url'],
                'image'       => ['required', 'image', 'max:2048'],
            ]);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('banners', 'public');
            }

            Banner::create($data);
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan banner: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('dashboard.cms.banner.form', [
            'banner' => $banner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        try {
            $data = $request->validate([
                'title'       => ['required', 'string', 'max:40'],
                'description' => ['nullable', 'string', 'max:100'],
                'link'        => ['nullable', 'url'],
                'image'       => ['nullable', 'image', 'max:2048'],
            ]);

            if ($request->hasFile('image')) {
                // hapus file lama kalau ada
                if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                    Storage::disk('public')->delete($banner->image);
                }

                $data['image'] = $request->file('image')->store('banners', 'public');
            }

            $banner->update($data);
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui banner: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Banner berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            $banner->delete();
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.cms.banner.index')
                ->with('error', 'Terjadi kesalahan saat menghapus banner: ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.cms.banner.index')
            ->with('success', 'Banner berhasil dihapus.');
    }
}
