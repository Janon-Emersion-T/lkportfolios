<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index(Request $request)
    {
        $query = Recommendation::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('recommender', 'LIKE', "%{$search}%")
                  ->orWhere('relationship', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $recommendation = $query->get();
        return view('portal.partials.recommendation.recommendation', compact('recommendation'));
    }

    public function create()
    {
        return view('portal.partials.recommendation.recommendationadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'recommender' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'month' => 'nullable|string',
            'year' => 'nullable|integer',
            'description' => 'required|string',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Recommendation::create([
            'user_id' => auth()->id(),
            'recommender' => $request->recommender,
            'relationship' => $request->relationship,
            'month' => $request->month,
            'year' => $request->year,
            'description' => $request->description,
            'media' => $request->media,
            'is_verified' => $request->boolean('is_verified'),
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('recommendation.index')->with('success', 'Recommendation added successfully!');
    }

    public function show($id)
    {
        $recommendation = Recommendation::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.recommendation.recommendationshow', compact('recommendation'));
    }

    public function edit($id)
    {
        $recommendation = Recommendation::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.recommendation.recommendationedit', compact('recommendation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'recommender' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'month' => 'nullable|string',
            'year' => 'nullable|integer',
            'description' => 'required|string',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $recommendation = Recommendation::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        
        $recommendation->update($request->all());

        return redirect()->route('recommendation.index')->with('success', 'Recommendation updated successfully!');
    }

    public function destroy($id)
    {
        $recommendation = Recommendation::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $recommendation->delete();

        return redirect()->route('recommendation.index')->with('success', 'Recommendation deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $recommendation = Recommendation::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $recommendation->update([
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return response()->json(['message' => 'Recommendation visibility updated!', 'recommendation' => $recommendation]);
    }
}
