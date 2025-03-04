<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $query = Education::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('school', 'LIKE', "%{$search}%")
                  ->orWhere('degree', 'LIKE', "%{$search}%")
                  ->orWhere('field_of_study', 'LIKE', "%{$search}%");
            });
        }

        $education = $query->get();
        return view('portal.partials.education.education', compact('education'));
    }

    public function create()
    {
        return view('portal.partials.education.educationadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'school' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_month' => 'required|string',
            'start_year' => 'required|integer',
            'end_month' => 'nullable|string',
            'end_year' => 'nullable|integer',
            'grade' => 'nullable|string',
            'is_current' => 'nullable|boolean',
            'activities' => 'nullable|string',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Education::create(array_merge(
            $request->all(),
            ['user_id' => auth()->id()]
        ));

        return redirect()->route('education.index')->with('success', 'Education added successfully!');
    }

    public function show($id)
    {
        $education = Education::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.education.educationshow', compact('education'));
    }

    public function edit($id)
    {
        $education = Education::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.education.educationedit', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'school' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'start_month' => 'required|string',
            'start_year' => 'required|integer',
            'end_month' => 'nullable|string',
            'end_year' => 'nullable|integer',
            'grade' => 'nullable|string',
            'is_current' => 'nullable|boolean',
            'activities' => 'nullable|string',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $education = Education::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $education->update($request->all());

        return redirect()->route('education.index')->with('success', 'Education updated successfully!');
    }

    public function destroy($id)
    {
        $education = Education::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $education = Education::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $education->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0,
        ]);

        return response()->json(['message' => 'Education CV visibility updated!', 'education' => $education]);
    }
}
