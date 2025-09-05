<?php

namespace App\Http\Controllers\Dashboard\CMS;

use App\Http\Controllers\Controller;
use App\Models\FQA;
use Illuminate\Http\Request;

class FQAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.cms.fqa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.cms.fqa.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title'       => ['required', 'string', 'max:50'],
                'description' => ['required', 'string'],
            ]);

            FQA::create($data);

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'FQA berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FQA $fqa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FQA $fqa)
    {
        return view('dashboard.cms.fqa.form', [
            'fqa' => $fqa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FQA $fqa)
    {
        try {
            $data = $request->validate([
                'title'       => ['required', 'string', 'max:50'],
                'description' => ['required', 'string'],
            ]);

            $fqa->update($data);

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'FQA berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FQA $fqa)
    {
        try {
            $fqa->delete();

        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.cms.fqa.index')
                ->with('error', 'Terjadi kesalahan saat menghapus pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.cms.fqa.index')
            ->with('success', 'FQA berhasil dihapus.');
    }
}
