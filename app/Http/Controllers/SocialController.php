<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(Request $request)
    {
        $query = Social::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('platform', 'LIKE', "%{$search}%");
        }

        $social = $query->get();
        return view('portal.partials.social.social', compact('social'));
    }

    public function create()
    {
        return view('portal.partials.social.socialadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string',
            'profile_url' => 'required|url|max:512',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Social::create([
            'user_id' => auth()->id(),
            'platform' => $request->platform,
            'profile_url' => $request->profile_url,
            'add_to_cv' => $request->boolean('add_to_cv'), 
        ]);

        return redirect()->route('social.index')->with('success', 'Social media profile added successfully!');
    }

    public function show($id)
    {
        $social = Social::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.social.socialshow', compact('social'));
    }

    public function edit($id)
    {
        $social = Social::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.social.socialedit', compact('social'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'platform' => 'required|string',
            'profile_url' => 'required|url|max:512',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $social = Social::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $social->update([
            'platform' => $request->platform,
            'profile_url' => $request->profile_url,
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('social.index')->with('success', 'Social media profile updated successfully!');
    }

    public function destroy($id)
    {
        $social = Social::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $social->delete();

        return redirect()->route('social.index')->with('success', 'Social media profile deleted successfully!');
    }

    public function toggleUseOnCV(Request $request, $id)
    {
        $social = Social::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $social->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0,
        ]);

        return response()->json(['message' => 'Social media visibility updated successfully!', 'social' => $social]);
    }
}
