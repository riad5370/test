<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Donar;
use Illuminate\Http\Request;

class DonarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donars = Donar::all();
        return view('admin.donar.index',[
            'donars'=> $donars, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.donar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:donars',
            'title' => 'nullable',
            'social_link' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/donars/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        Donar::create($validateData);

        //redirect
        return back()->withSuccess('New Donor created successfully!');
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
    public function edit(Donar $donar)
    {
        return view('admin.donar.edit',[
            'donar'=> $donar, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donar $donar)
    {
        $rules = [
            'name' => 'required|unique:donars,name,'.$donar->id,
            'title' => 'nullable',
            'social_link' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
       // Image management using helper function
       if ($request->hasFile('image')) {
            // Delete previous image
            ImageHelper::deleteImage('/images/donars/' . $donar->image);

            // Upload new image
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/donars/');
            $validateData['image'] = $imageName;
        }
        // update data
        $donar->update($validateData);

        //redirect
        return redirect()->route('donars.index')->withSuccess('donar updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donar $donar)
    {
        if($donar->image){
            // Delete image
            ImageHelper::deleteImage('/images/donars/' . $donar->image);
        }
        $donar->delete();
        return back()->with('success','Your Record Has been deleted');
    }
}
