<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index(Request $request)
    {
        $query = Volunteer::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('organization', 'LIKE', "%{$search}%")
                  ->orWhere('role', 'LIKE', "%{$search}%")
                  ->orWhere('cause', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%");
            });
        }

        $volunteer = $query->get();
        return view('portal.partials.volunteer.volunteer', compact('volunteer'));
    }

    public function create()
    {
        return view('portal.partials.volunteer.volunteeradd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'organization' => 'required|string|max:255',
            'role' => 'required|string',
            'cause' => 'required|string',
            'is_current' => 'nullable|boolean',
            'start_month' => 'nullable|integer',
            'start_year' => 'nullable|integer',
            'end_month' => 'nullable|integer',
            'end_year' => 'nullable|integer',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Volunteer::create([
            'user_id' => auth()->id(),
            'organization' => $request->organization,
            'role' => $request->role,
            'cause' => $request->cause,
            'is_current' => $request->boolean('is_current'),
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'end_month' => $request->end_month,
            'end_year' => $request->end_year,
            'location' => $request->location,
            'description' => $request->description,
            'media' => $request->media,
            'is_verified' => $request->boolean('is_verified'),
            'verified_date' => $request->verified_date,
            'verifier_id' => $request->verifier_id,
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('volunteer.index')->with('success', 'Volunteer experience added successfully!');
    }

    public function show($id)
    {
        $volunteer = Volunteer::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.volunteer.volunteershow', compact('volunteer'));
    }

    public function edit($id)
    {
        $volunteer = Volunteer::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.volunteer.volunteeredit', compact('volunteer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'organization' => 'required|string|max:255',
            'role' => 'required|string',
            'cause' => 'required|string',
            'is_current' => 'nullable|boolean',
            'start_month' => 'nullable|integer',
            'start_year' => 'nullable|integer',
            'end_month' => 'nullable|integer',
            'end_year' => 'nullable|integer',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $volunteer = Volunteer::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $volunteer->update([
            'organization' => $request->organization,
            'role' => $request->role,
            'cause' => $request->cause,
            'is_current' => $request->boolean('is_current'),
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'end_month' => $request->end_month,
            'end_year' => $request->end_year,
            'location' => $request->location,
            'description' => $request->description,
            'media' => $request->media,
            'is_verified' => $request->boolean('is_verified'),
            'verified_date' => $request->verified_date,
            'verifier_id' => $request->verifier_id,
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('volunteer.index')->with('success', 'Volunteer experience updated successfully!');
    }

    public function destroy($id)
    {
        $volunteer = Volunteer::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $volunteer->delete();

        return redirect()->route('volunteer.index')->with('success', 'Volunteer experience deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $volunteer = Volunteer::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $volunteer->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0, // Fix column name
        ]);

        return response()->json(['message' => 'Volunteer experience visibility updated successfully!', 'experience' => $experience]);
    }
}
