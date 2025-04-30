<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();

        return Inertia::render('Schools/Index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Schools/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchoolRequest $request)
    {
        $validated = $request->validated();

        // Handle file upload
        if ($request->hasFile('app_icon')) {
            $validated['app_icon'] = $request->file('app_icon')->store('schools/icons', 'public');
        }
        // dd($validated);

        School::create($validated);

        return redirect()->route('schools.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return Inertia::render('Schools/Show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return Inertia::render('Schools/Edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $validated = $request->validated();

        // Handle file upload
        if ($request->hasFile('app_icon')) {
            $validated['app_icon'] = $request->file('app_icon')->store('schools/icons', 'public');
        } else {
            unset($validated['app_icon']);
        }

        $school->update($validated);

        return redirect()->route('schools.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $school->delete();

        return redirect()->route('schools.index');
    }

    /**
     * List schools.
     */
    public function list()
    {
        return School::all();
    }

    /**
     * Get school detail
     */
    public function detail(School $school)
    {
        return $school;
    }
}
