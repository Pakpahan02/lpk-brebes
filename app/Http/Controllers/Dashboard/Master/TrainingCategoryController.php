<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;

class TrainingCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.master.training-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.training-category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
            ]);

            TrainingCategory::create($data);

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan banner: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingCategory $trainingCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingCategory $trainingCategory)
    {
        return view('dashboard.master.training-category.form', [
            'trainingCategory' => $trainingCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingCategory $trainingCategory)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
            ]);

            $trainingCategory->update($data);

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui banner: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingCategory $trainingCategory)
    {
        try {
            $trainingCategory->delete();

        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.master.training-category.index')
                ->with('error', 'Terjadi kesalahan saat menghapus banner: ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.master.training-category.index')
            ->with('success', 'Banner berhasil dihapus.');
    }
}
