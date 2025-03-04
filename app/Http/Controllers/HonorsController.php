<?php

namespace App\Http\Controllers;

use App\Models\Honors;
use Illuminate\Http\Request;

class HonorsController extends Controller
{
    public function index(Request $request)
    {
        $query = Honors::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('issuing_organization', 'LIKE', "%{$search}%")
                  ->orWhere('award_year', 'LIKE', "%{$search}%");
            });
        }

        $honors = $query->get();
        return view('portal.partials.honors.honors', compact('honors'));
    }

    public function create()
    {
        return view('portal.partials.honors.honorsadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'award_month' => 'nullable|string|max:20',
            'award_year' => 'required|integer|min:1900|max:' . date('Y'),
            'issuing_organization' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'credential_url' => 'nullable|url',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Honors::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'award_month' => $request->award_month,
            'award_year' => $request->award_year,
            'issuing_organization' => $request->issuing_organization,
            'description' => $request->description,
            'media' => $request->media,
            'credential_url' => $request->credential_url,
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('honors.index')->with('success', 'Honor/Award added successfully!');
    }

    public function show($id)
    {
        $honors = honors::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.honors.honorsshow', compact('honors'));
    }

    public function edit($id)
    {
        $honors = Honors::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.honors.honorsedit', compact('honors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'award_month' => 'nullable|string|max:20',
            'award_year' => 'required|integer|min:1900|max:' . date('Y'),
            'issuing_organization' => 'required|string|max:255',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'credential_url' => 'nullable|url',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $honors = Honors::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $honors->update($request->only([
            'title', 'award_month', 'award_year', 'issuing_organization', 'description', 'media', 'credential_url', 'add_to_cv'
        ]));

        return redirect()->route('honors.index')->with('success', 'Honor/Award updated successfully!');
    }

    public function destroy($id)
    {
        $honors = Honors::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $honors->delete();

        return redirect()->route('honors.index')->with('success', 'Honor/Award deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $honors = Honors::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $honors->update(['add_to_cv' => $request->has('add_to_cv') ? 1 : 0]);

        return response()->json(['message' => 'Honor/Award visibility updated successfully!', 'honors' => $honors]);
    }
}