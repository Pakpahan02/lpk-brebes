<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $latestTraining = Training::with('training_category')->latest()->first();

        $categories = TrainingCategory::all();

        $query = Training::query()
            ->with('training_category');

        if ($request->filled('searsh')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $trainings = $query->orderByDesc('created_at')
            ->paginate(8);

        return view('end-user.training.index', [
            'trainings' => $trainings,
            'latestTraining' => $latestTraining,
            'categories' => $categories,
        ]);
    }

    public function show(Training $training)
    {
        $relatedTraining = Training::where('id', '!=', $training->id)
            ->where('category_id', $training->category_id)
            ->limit(3)
            ->get();

        return view('end-user.training.show', [
            'training' => $training,
            'relatedTraining' => $relatedTraining,
        ]);
    }
}
