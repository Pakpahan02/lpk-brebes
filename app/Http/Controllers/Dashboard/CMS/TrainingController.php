<?php

namespace App\Http\Controllers\Dashboard\CMS;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function index()
    {
        return view('dashboard.cms.training.index');
    }

    public function create()
    {
        $categories = TrainingCategory::all();

        return view('dashboard.cms.training.form', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'category_id' => ['required', 'exists:training_categories,id'],
                'title'       => ['required', 'string', 'max:50'],
                'description' => ['required', 'string'],
                'image'       => ['required', 'image', 'max:2048'],
            ]);

            $data['visible'] = $request->boolean('visible');

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('trainings', 'public');
            }

            Training::create($data);
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.cms.training.index')
            ->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function show(Training $training)
    {
        //
    }

    public function edit(Training $training)
    {
        $categories = TrainingCategory::all();

        return view('dashboard.cms.training.form', [
            'training'   => $training,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Training $training)
    {
        try {
            $data = $request->validate([
                'category_id' => ['required', 'exists:training_categories,id'],
                'title'       => ['required', 'string', 'max:50'],
                'description' => ['required', 'string'],
                'image'       => ['nullable', 'image', 'max:2048'],
            ]);

            $data['visible'] = $request->boolean('visible');

            if ($request->hasFile('image')) {
                if ($training->image && Storage::disk('public')->exists($training->image)) {
                    Storage::disk('public')->delete($training->image);
                }

                $data['image'] = $request->file('image')->store('trainings', 'public');
            }

            $training->update($data);
        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.cms.training.index')
            ->with('success', 'Pelatihan berhasil diperbarui.');
    }

    public function destroy(Training $training)
    {
        try {
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }

            $training->delete();
        } catch (\Throwable $th) {
            return redirect()
                ->route('dashboard.cms.training.index')
                ->with('error', 'Terjadi kesalahan saat menghapus pelatihan: ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.cms.training.index')
            ->with('success', 'Pelatihan berhasil dihapus.');
    }

    public function toggleVisible(Training $training)
    {
        try {
            $training->visible = !$training->visible;
            $training->save();

            return response()->json([
                'success' => true,
                'visible' => $training->visible,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

}
