<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {
        $query = Organization::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('organization', 'LIKE', "%{$search}%")
                  ->orWhere('position_held', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $organization = $query->get();
        return view('portal.partials.organization.organization', compact('organization'));
    }

    public function create()
    {
        return view('portal.partials.organization.organizationadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'organization' => 'required|string|max:255',
            'position_held' => 'required|string|max:255',
            'membership_ongoing' => 'nullable|boolean',
            'start_month' => 'nullable|string|max:20',
            'start_year' => 'nullable|integer',
            'end_month' => 'nullable|string|max:20',
            'end_year' => 'nullable|integer',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Organization::create([
            'user_id' => auth()->id(),
            'organization' => $request->organization,
            'position_held' => $request->position_held,
            'membership_ongoing' => $request->boolean('membership_ongoing'),
            'start_month' => $request->start_month,
            'start_year' => $request->start_year,
            'end_month' => $request->end_month,
            'end_year' => $request->end_year,
            'description' => $request->description,
            'media' => $request->media,
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('organization.index')->with('success', 'Organization added successfully!');
    }

    public function show($id)
    {
        $organization = Organization::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.organization.organizationshow', compact('organization'));
    }

    public function edit($id)
    {
        $organization = Organization::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.organization.organizationedit', compact('organization'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'organization' => 'required|string|max:255',
            'position_held' => 'required|string|max:255',
            'membership_ongoing' => 'nullable|boolean',
            'start_month' => 'nullable|string|max:20',
            'start_year' => 'nullable|integer',
            'end_month' => 'nullable|string|max:20',
            'end_year' => 'nullable|integer',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $organization = Organization::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $organization->update($request->all());

        return redirect()->route('organization.index')->with('success', 'Organization updated successfully!');
    }

    public function destroy($id)
    {
        $organization = Organization::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $organization->delete();

        return redirect()->route('organization.index')->with('success', 'Organization deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $organization = Organization::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $organization->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0,
        ]);

        return response()->json(['message' => 'Organization visibility updated successfully!', 'organization' => $organization]);
    }
}