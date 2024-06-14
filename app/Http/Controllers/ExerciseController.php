<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.exercises.index', ['exercises' => Exercise::all()]);
        } else {
            return view('pages.exercises.index', ['exercises' => Exercise::all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $request->validated();

        $image_name = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/exercises'), $image_name);
        }

        Exercise::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image_name,
        ]);

        return redirect()->route('exercises.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        return view('pages.exercises.show', compact('exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        return view('dashboard.exercises.edit', compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        $request->validated();


        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($exercise->image) {
                $oldImagePath = public_path('assets/images/exercises/' . $exercise->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store new image
            $image = $request->file('image');
            $imageName = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/exercises'), $imageName);
            $exercise->image = $imageName;
        }


        $exercise->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('exercises.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        if ($exercise->image) {
            $imagePath = public_path('assets/images/exercises/' . $exercise->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $exercise->delete();

        return redirect()->route('exercises.index');
    }
}
