<?php

namespace App\Http\Controllers;

use App\Models\Street;
use App\Http\Requests\StoreStreetRequest;
use App\Http\Requests\UpdateStreetRequest;

class StreetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $streets = street::all();
        return view('streets.street_index', compact('streets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('streets.street_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestreetRequest $request)
    {

        // Create the street with validated data
        street::create($request->validated());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'street created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(street $street)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(street $street)
    {
        return view(
            'streets.street_edit',
            compact('street')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestreetRequest $request, street $street)
    {
        // Validate the request data (already handled by the form request)
        $validated = $request->validated();

        // Update the street with validated data
        $street->update($validated);

        // Redirect back with a success message
        return redirect()->route('streets')->with('success', 'street updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(street $street)
    {
        $street->delete();
        return redirect()->route('streets')->with('success', 'street deleted successfully.');

    }
}
