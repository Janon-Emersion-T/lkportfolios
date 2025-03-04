<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $query = Test::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('test', 'LIKE', "%{$search}%")
                  ->orWhere('score', 'LIKE', "%{$search}%")
                  ->orWhere('test_month', 'LIKE', "%{$search}%")
                  ->orWhere('test_year', 'LIKE', "%{$search}%");
            });
        }

        $test = $query->get();
        return view('portal.partials.test.test', compact('test'));
    }

    public function create()
    {
        return view('portal.partials.test.testadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'test' => 'required|string|max:255',
            'score' => 'required|numeric',
            'test_month' => 'required|string',
            'test_year' => 'required|numeric',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'credential_url' => 'nullable|url',
            'is_verified' => 'nullable|boolean',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        Test::create([
            'user_id' => auth()->id(),
            'test' => $request->test,
            'score' => $request->score,
            'test_month' => $request->test_month,
            'test_year' => $request->test_year,
            'description' => $request->description,
            'media' => $request->media,
            'credential_url' => $request->credential_url,
            'is_verified' => $request->boolean('is_verified'),
            'verifier_id' => $request->verifier_id,
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('test.index')->with('success', 'Test score added successfully!');
    }

    public function show($id)
    {
        $test = Test::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.test.testshow', compact('test'));
    }

    public function edit($id)
    {
        $test = Test::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.test.testedit', compact('test'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'test' => 'required|string|max:255',
            'score' => 'required|numeric',
            'test_month' => 'required|string',
            'test_year' => 'required|numeric',
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'credential_url' => 'nullable|url',
            'is_verified' => 'nullable|boolean',
            'verifier_id' => 'nullable|exists:users,id',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $test = Test::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $test->update([
            'test' => $request->test,
            'score' => $request->score,
            'test_month' => $request->test_month,
            'test_year' => $request->test_year,
            'description' => $request->description,
            'media' => $request->media,
            'credential_url' => $request->credential_url,
            'is_verified' => $request->boolean('is_verified'),
            'verifier_id' => $request->verifier_id,
            'add_to_cv' => $request->boolean('add_to_cv'),
        ]);

        return redirect()->route('test.index')->with('success', 'Test score updated successfully!');
    }

    public function destroy($id)
    {
        $test = Test::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $test->delete();

        return redirect()->route('test.index')->with('success', 'Test score deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $test = Test::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $test->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0,
        ]);

        return response()->json(['message' => 'Test score visibility updated successfully!', 'test' => $test]);
    }
}
