<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Models\ActivitieOther;
use Illuminate\Http\Request;

class ActivitieOtherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activitieOthers = ActivitieOther::all();
        return view('admin.otherActivitie.index',[
           'activitieOthers'=>$activitieOthers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.otherActivitie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'title' => 'required|string',
            'details' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/activitieOther/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        ActivitieOther::create($validateData);

        //redirect
        return back()->withSuccess('New Activitie Added!');
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
    public function edit(ActivitieOther $activitieother)
    {
        return view('admin.otherActivitie.edit',[
            'activitieOther'=>$activitieother
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivitieOther $activitieother)
    {
        $rules = [
            'name' => 'required|string',
            'title' => 'required|string',
            'details' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            // Delete previous image
            ImageHelper::deleteImage('/images/activitieOther/' . $activitieother->image);

            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/activitieOther/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        $activitieother->update($validateData);
        //redirect
        return redirect()->route('activitieothers.index')->withSuccess('Activitie Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivitieOther $activitieother)
    {
        if($activitieother->image){
            // Delete image
            ImageHelper::deleteImage('/images/activitieOther/' . $activitieother->image);
        }
        $activitieother->delete();
        return back()->with('success','deleted');
    }
}
