<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $query = Skill::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('skill', 'LIKE', "%{$search}%")
                  ->orWhere('skill_type', 'LIKE', "%{$search}%")
                  ->orWhere('skill_level', 'LIKE', "%{$search}%");
            });
        }

        $skills = $query->get();
        return view('portal.partials.skills.skills', compact('skills'));
    }

    public function create()
    {
        return view('portal.partials.skills.skilladd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
            'skill_type' => 'required|string',
            'skill_level' => 'required|string',
            'use_on_CV' => 'nullable|boolean',
        ]);

        Skill::create([
            'user_id' => auth()->id(),
            'skill' => $request->skill,
            'skill_type' => $request->skill_type,
            'skill_level' => $request->skill_level,
            'use_on_CV' => $request->boolean('use_on_CV'), // Ensure boolean value
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill added successfully!');
    }

    public function show($id)
    {
        $skill = Skill::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.skills.skillshow', compact('skill'));
    }

    public function edit($id)
    {
        $skill = Skill::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.skills.skilledit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skill' => 'required|string|max:255',
            'skill_type' => 'required|string',
            'skill_level' => 'required|string',
            'use_on_CV' => 'nullable|boolean',
        ]);

        $skill = Skill::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $skill->update([
            'skill' => $request->skill,
            'skill_type' => $request->skill_type,
            'skill_level' => $request->skill_level,
            'use_on_CV' => $request->use_on_CV, // Will always receive 0 or 1
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully!');
    }

    public function destroy($id)
    {
        $skill = Skill::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully!');
    }

    public function toggleUseOnCV(Request $request, $id)
    {
        $skill = Skill::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $skill->update([
            'use_on_cv' => $request->has('use_on_cv') ? 1 : 0, // Fix column name
        ]);

        return response()->json(['message' => 'Skill visibility updated successfully!', 'skill' => $skill]);
    }
}
