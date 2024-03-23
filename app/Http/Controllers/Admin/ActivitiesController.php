<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Activitie;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activitie::all();
        return view('admin.activite.index',[
            'activities'=> $activities, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'about' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/activitie/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        Activitie::create($validateData);

        //redirect
        return back()->withSuccess('New Activitie Create Successfull!');
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
    public function edit(Activitie $activity)
    {
        return view('admin.activite.edit',[
            'activity'=> $activity, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activitie $activity)
    {
        $rules = [
            'title' => 'required',
            'about' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
             // Delete previous image
             ImageHelper::deleteImage('/images/activitie/' . $activity->image);

             // Upload new image
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/activitie/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        // Update data
        $activity->update($validateData);

        //redirect
        return redirect()->route('activities.index')->withSuccess('Activitie updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activitie $activity)
    {
        if($activity->image){
            // Delete image
            ImageHelper::deleteImage('/images/activitie/' . $activity->image);
        }
        $activity->delete();
        return back()->with('success','deleted');
    }
}
