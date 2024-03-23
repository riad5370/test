<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilitys = Facility::all();
        return view('admin.facility.index',[
           'facilitys'=>$facilitys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.facility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'icon' => 'nullable|string',
            'details' => 'required|string',
        ];
        // Validate input data
        $validatedData = $request->validate($rules);
        Facility::create($validatedData);
        return back()->withSuccess('New Facility Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return view('admin.facility.edit',[
            'facility'=>$facility
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        $rules = [
            'title' => 'required|string',
            'icon' => 'nullable|string',
            'details' => 'required|string',
        ];
        // Validate input data
        $validatedData = $request->validate($rules);
        $facility->update($validatedData);
        return redirect()->route('facilities.index')->withSuccess('Facility Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return back()->withSuccess('Facility Deleted!');
    }
}
