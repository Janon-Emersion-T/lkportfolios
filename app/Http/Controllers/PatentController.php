<?php

namespace App\Http\Controllers;

use App\Models\Patent;
use Illuminate\Http\Request;

class PatentController extends Controller
{
    public function index(Request $request)
    {
        $query = Patent::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('patent_application_number', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%");
            });
        }

        $patent = $query->get();
        return view('portal.partials.patent.patent', compact('patent'));
    }

    public function create()
    {
        return view('portal.partials.patent.patentadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'patent_application_number' => 'required|string|unique:patent',
            'status' => 'required|string',
            'issue_date' => 'nullable|date',
            'inventors' => 'nullable|string',
            'description' => 'nullable|string',
            'patent_url' => 'nullable|url',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Patent::create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return redirect()->route('patent.index')->with('success', 'Patent added successfully!');
    }

    public function show($id)
    {
        $patent = Patent::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.patent.patentshow', compact('patent'));
    }

    public function edit($id)
    {
        $patent = Patent::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.patent.patentedit', compact('patent'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'patent_application_number' => 'required|string|unique:patent,patent_application_number,' . $id,
            'status' => 'required|string',
            'issue_date' => 'nullable|date',
            'inventors' => 'nullable|string',
            'description' => 'nullable|string',
            'patent_url' => 'nullable|url',
            'media' => 'nullable|array',
            'is_verified' => 'nullable|boolean',
            'verified_date' => 'nullable|date',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $patent = Patent::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $patent->update($request->all());

        return redirect()->route('patent.index')->with('success', 'Patent updated successfully!');
    }

    public function destroy($id)
    {
        $patent = Patent::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $patent->delete();

        return redirect()->route('patent.index')->with('success', 'Patent deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $patent = Patent::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $patent->update(['add_to_cv' => $request->boolean('add_to_cv')]);

        return response()->json(['message' => 'Patent CV visibility updated!', 'patent' => $patent]);
    }
}