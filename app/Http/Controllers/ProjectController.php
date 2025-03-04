<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $project = $query->get();
        return view('portal.partials.project.project', compact('project'));
    }

    public function create()
    {
        return view('portal.partials.project.projectadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_month' => 'nullable|string',
            'start_year' => 'nullable|integer',
            'end_month' => 'nullable|string',
            'end_year' => 'nullable|integer',
            'is_current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'contributors' => 'nullable|string',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|integer',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Project::create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return redirect()->route('project.index')->with('success', 'Project added successfully!');
    }

    public function show($id)
    {
        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.project.projectshow', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.project.projectedit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_month' => 'nullable|string',
            'start_year' => 'nullable|integer',
            'end_month' => 'nullable|string',
            'end_year' => 'nullable|integer',
            'is_current' => 'nullable|boolean',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'contributors' => 'nullable|string',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|integer',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $project->update($request->all());

        return redirect()->route('project.index')->with('success', 'Project updated successfully!');
    }

    public function destroy($id)
    {
        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $project = Project::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $project->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0,
        ]);

        return response()->json(['message' => 'Project visibility updated successfully!', 'project' => $project]);
    }
}