<?php

namespace App\Http\Controllers;

use App\Models\Careerbreak;
use Illuminate\Http\Request;

class CareerbreakController extends Controller
{
    public function index(Request $request)
    {
        $query = Careerbreak::where('user_id', auth()->id());

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('type', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        $careerbreak = $query->get();
        return view('portal.partials.careerbreak.careerbreak', compact('careerbreak'));
    }

    public function create()
    {
        return view('portal.partials.careerbreak.careerbreakadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'is_current' => 'nullable|boolean',
            'start_month' => 'required|integer|min:1|max:12',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable|integer|min:1|max:12',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'add_to_cv' => 'nullable|boolean',
        ]);

        CareerBreak::create(array_merge($request->only([
            'type', 'location', 'is_current', 'start_month', 'start_year', 
            'end_month', 'end_year', 'description', 'media', 'add_to_cv'
        ]), ['user_id' => auth()->id()]));

        return redirect()->route('careerbreak.index')->with('success', 'Career break added successfully!');
    }

    public function show($id)
    {
        $careerbreak = CareerBreak::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.careerbreak.careerbreakshow', compact('careerbreak'));
    }

    public function edit($id)
    {
        $careerbreak = CareerBreak::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return view('portal.partials.careerbreak.careerbreakedit', compact('careerbreak'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'is_current' => 'nullable|boolean',
            'start_month' => 'required|integer|min:1|max:12',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable|integer|min:1|max:12',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
            'media' => 'nullable|array',
            'add_to_cv' => 'nullable|boolean',
        ]);

        $careerbreak = CareerBreak::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $careerbreak->update($request->only([
            'type', 'location', 'is_current', 'start_month', 'start_year',
            'end_month', 'end_year', 'description', 'media', 'add_to_cv'
        ]));

        return redirect()->route('careerbreak.index')->with('success', 'Career break updated successfully!');
    }

    public function destroy($id)
    {
        $careerbreak = CareerBreak::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $careerbreak->delete();

        return redirect()->route('careerbreak.index')->with('success', 'Career break deleted successfully!');
    }

    public function toggleAddToCV(Request $request, $id)
    {
        $careerbreak = CareerBreak::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        
        $careerbreak->update([
            'add_to_cv' => $request->has('add_to_cv') ? 1 : 0,
        ]);

        return response()->json(['message' => 'Career break CV visibility updated successfully!', 'careerbreak' => $careerbreak]);
    }
}
