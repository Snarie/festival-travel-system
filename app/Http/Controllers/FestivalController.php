<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Http\Requests\StoreFestivalRequest;
use App\Http\Requests\UpdateFestivalRequest;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $festivals = Festival::all();

        return view('festival.index', compact('festivals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('festival.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFestivalRequest $request)
    {
        Festival::create($request->validated());

        return redirect()->route('festival.create')->with('success', 'Festival created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        return view('festival.show', compact('festival'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Festival $festival)
    {
        return view('festival.edit', compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFestivalRequest $request, Festival $festival)
    {
        $festival->update($request->validated());

        return redirect()->route('festival.edit')->with('success', 'Festival updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival)
    {
        $festival->delete();

        return redirect()->route('festival.index')->with('success', 'Festival deleted successfully.');
    }
}
