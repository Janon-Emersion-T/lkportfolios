<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Publication::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('publisher', 'LIKE', "%{$search}%")
                  ->orWhere('contributors', 'LIKE', "%{$search}%");
            });
        }

        $publication = $query->get();
        return view('portal.partials.publication.publication', compact('publication'));
    }

    public function create()
    {
        return view('portal.partials.publication.publicationadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'publication_month' => 'nullable|string',
            'publication_year' => 'required|integer',
            'publisher' => 'nullable|string',
            'contributors' => 'nullable|string',
            'description' => 'nullable|string',
            'publication_url' => 'nullable|url',
            'media' => 'nullable|array',
            'is_verified' => 'boolean',
            'add_to_cv' => 'boolean',
        ]);

        Publication::create(array_merge(
            $request->all(),
            ['user_id' => auth()->id()]
        ));

        return redirect()->route('publication.index')->with('success', 'Publication added successfully!');
    }

    public function show($id)
    {
        $publication = Publication::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.publication.publicationshow', compact('publication'));
    }

    public function edit($id)
    {
        $publication = Publication::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.publication.publicationedit', compact('publication'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'publication_month' => 'nullable|string',
            'publication_year' => 'required|integer',
            'publisher' => 'nullable|string',
            'contributors' => 'nullable|string',
            'description' => 'nullable|string',
            'publication_url' => 'nullable|url',
            'media' => 'nullable|array',
            'is_verified' => 'boolean',
            'add_to_cv' => 'boolean',
        ]);

        $publication = Publication::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $publication->update($request->only([
            'title', 'publication_month', 'publication_year', 'publisher',
            'contributors', 'description', 'publication_url', 'media',
            'is_verified', 'add_to_cv'
        ]));

        return redirect()->route('publication.index')->with('success', 'Publication updated successfully!');
    }

    public function destroy($id)
    {
        $publication = Publication::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $publication->delete();

        return redirect()->route('publication.index')->with('success', 'Publication deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $publication = Publication::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $publication->update(['add_to_cv' => $request->has('add_to_cv') ? 1 : 0]);

        return response()->json(['message' => 'Publication visibility updated successfully!', 'publication' => $publication]);
    }
}