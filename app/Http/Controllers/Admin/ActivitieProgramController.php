<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\ActivitiePrograms;
use Illuminate\Http\Request;

class ActivitieProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activitiePrograms = ActivitiePrograms::all();
        return view('admin.detailsActivitie.index',[
           'activitiePrograms'=>$activitiePrograms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.detailsActivitie.create');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/activitieprogram/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        ActivitiePrograms::create($validateData);

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
    public function edit(ActivitiePrograms $activitieprogram)
    {
        return view('admin.detailsActivitie.edit',[
            'activitieprogram'=>$activitieprogram
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActivitiePrograms $activitieprogram)
    {
        $rules = [
            'title' => 'required|string',
            'icon' => 'nullable|string',
            'details' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
             // Delete previous image
             ImageHelper::deleteImage('/images/activitieprogram/' . $activitieprogram->image);

            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/activitieprogram/');
            $validateData ['image'] = $imageName;
        }
        // update data
        $activitieprogram->update($validateData);

       //redirect
       return redirect()->route('activitieprograms.index')->withSuccess('Activitie Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivitiePrograms $activitieprogram)
    {
        if($activitieprogram->image){
            // Delete image
            ImageHelper::deleteImage('/images/activitieprogram/' . $activitieprogram->image);
        }
        $activitieprogram->delete();
        return back()->with('success','deleted');
    }
}
