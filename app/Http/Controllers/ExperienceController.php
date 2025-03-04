<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        $query = Experience::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('company', 'LIKE', "%{$search}%")
                  ->orWhere('employment_type', 'LIKE', "%{$search}%");
            });
        }

        $experience = $query->get();
        return view('portal.partials.experience.experience', compact('experience'));
    }

    public function create()
    {
        return view('portal.partials.experience.experienceadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'employment_type' => 'required|string',
            'company' => 'required|string|max:255',
            'is_current' => 'nullable|boolean',
            'start_month' => 'required|string',
            'start_year' => 'required|integer',
            'end_month' => 'nullable|string',
            'end_year' => 'nullable|integer',
            'location' => 'nullable|string',
            'location_type' => 'nullable|string',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Experience::create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return redirect()->route('experience.index')->with('success', 'Experience added successfully!');
    }

    public function show($id)
    {
        $experience = Experience::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.experience.experienceshow', compact('experience'));
    }

    public function edit($id)
    {
        $experience = Experience::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.experience.experienceedit', compact('experience'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'employment_type' => 'required|string',
            'company' => 'required|string|max:255',
            'is_current' => 'nullable|boolean',
            'start_month' => 'required|string',
            'start_year' => 'required|integer',
            'end_month' => 'nullable|string',
            'end_year' => 'nullable|integer',
            'location' => 'nullable|string',
            'location_type' => 'nullable|string',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $experience = Experience::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $experience->update($request->all());

        return redirect()->route('experience.index')->with('success', 'Experience updated successfully!');
    }

    public function destroy($id)
    {
        $experience = Experience::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $experience->delete();

        return redirect()->route('experience.index')->with('success', 'Experience deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $experience = Experience::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $experience->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0,
        ]);

        return response()->json(['message' => 'Experience visibility updated successfully!', 'experience' => $experience]);
    }
}