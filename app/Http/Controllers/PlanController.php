<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Exercise;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.plans.index', ['plans' => Plan::all()]);
        } else {
            return view('pages.plans.index', ['plans' => Plan::all()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exercises = Exercise::all();
        if (Auth::user()->role == 'admin') {
            return view('dashboard.plans.create', ['exercises' => $exercises]);
        } else {
            return view('pages.plans.create', ['exercises' => $exercises]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        DB::beginTransaction();

        try {
            $request->validated();

            $image_name = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/plans/'), $image_name);
            }
            // Membuat entri baru di tabel 'programs' dan menyimpan data yang terkait
            $plan = Plan::create([
                'name' => $request->name,
                'description' => $request->description,
                'duration' => $request->duration,
                'user_id' => $request->user_id,
                'image' => $image_name,
            ]);

            // Menyimpan setiap exercise yang terkait dengan plan
            foreach ($request->exercises as $exercise) {
                Program::create([
                    'exercise_id' => $exercise['id'],
                    'plan_id' => $plan->id,
                    'reps' => $exercise['reps'],
                    'sets' => $exercise['sets'],
                ]);
            }

            DB::commit();

            return redirect()->route('plans.index')->with('success', 'Program created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            // Kembalikan user ke halaman create dengan pesan error dan input sebelumnya
            Log::error($e->getMessage());
            return redirect()->route('plans.create')->with('error', 'Program failed to create: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        if (Auth::user()->role == 'admin') {
            return view('dashboard.plans.show', ['plan' => $plan]);
        } else {
            return view('pages.plans.show', ['plan' => $plan]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        $exercises = Exercise::all();
        return view('dashboard.plans.edit', ['plan' => $plan, 'exercises' => $exercises]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $request->validated();

        DB::beginTransaction();

        try {

            $image_name = $plan->image;
            if ($request->hasFile('image')) {
                // Delete old image
                if ($plan->image) {
                    unlink(public_path('assets/images/plans/' . $plan->image));
                }
                // Upload new image
                $image = $request->file('image');
                $image_name = $request->name . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/plans'), $image_name);
            }

            $plan->update([
                'name' => $request->name,
                'description' => $request->description,
                'duration' => $request->duration,
                'user_id' => $request->user()->id,
                'image' => $image_name,
            ]);

            // Update exercises
            $plan->programs()->delete(); // Remove old exercises
            foreach ($request->exercises as $exercise) {
                Program::create([
                    'plan_id' => $plan->id,
                    'exercise_id' => $exercise['id'],
                    'reps' => $exercise['reps'],
                    'sets' => $exercise['sets'],
                ]);
            }

            DB::commit();

            return redirect()->route('plans.show', $plan->id)->with('success', 'Plan updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('plans.edit', $plan->id)->with('error', 'Failed to update plan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //tolong buatkan function untuk menghpus semua program yang memiliki plan_id sesuai dengan id plan yang akan dihapus
        $plan->programs()->delete();
        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'Plan deleted successfully');
    }
}
