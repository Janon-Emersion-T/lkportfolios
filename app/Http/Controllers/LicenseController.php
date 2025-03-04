<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index(Request $request)
    {
        $query = License::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('issuing_organization', 'LIKE', "%{$search}%")
                  ->orWhere('credential_id', 'LIKE', "%{$search}%");
            });
        }

        $license = $query->get();
        return view('portal.partials.license.license', compact('license'));
    }

    public function create()
    {
        return view('portal.partials.license.licenseadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',
            'issue_month' => 'nullable|integer|min:1|max:12',
            'issue_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'expiration_month' => 'nullable|integer|min:1|max:12',
            'expiration_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 50),
            'credential_id' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'is_verified' => 'boolean',
            'add_to_cv' => 'boolean',
        ]);

        License::create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return redirect()->route('license.index')->with('success', 'License/Certification added successfully!');
    }

    public function show($id)
    {
        $license = License::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.license.licenseshow', compact('license'));
    }

    public function edit($id)
    {
        $license = License::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.license.licenseedit', compact('license'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',
            'issue_month' => 'nullable|integer|min:1|max:12',
            'issue_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'expiration_month' => 'nullable|integer|min:1|max:12',
            'expiration_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 50),
            'credential_id' => 'nullable|string|max:255',
            'credential_url' => 'nullable|url',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'is_verified' => 'boolean',
            'add_to_cv' => 'boolean',
        ]);

        $license = License::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $license->update($request->all());

        return redirect()->route('license.index')->with('success', 'License/Certification updated successfully!');
    }

    public function destroy($id)
    {
        $license = License::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $license->delete();

        return redirect()->route('license.index')->with('success', 'License/Certification deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $license = License::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $license->update(['add_to_cv' => $request->has('add_to_cv') ? 1 : 0]);

        return response()->json(['message' => 'CV visibility updated successfully!', 'license' => $license]);
    }
}
