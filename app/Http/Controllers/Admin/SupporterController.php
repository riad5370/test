<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Supporter;
use Illuminate\Http\Request;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supporters = Supporter::all();
        return view('admin.supporter.index',[
            'supporters'=> $supporters, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.supporter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'nullable',
            'about_supporter' => 'required',
            'social_link' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/supporter/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        Supporter::create($validateData);

        //redirect
        return back()->withSuccess('New Slider Create Successfull!');
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
    public function edit(Supporter $supporter)
    {
        return view('admin.supporter.edit',[
            'supporter'=> $supporter, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supporter $supporter)
    {
        $rules = [
            'name' => 'required',
            'email' => 'nullable',
            'about_supporter' => 'required',
            'social_link' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            // Delete previous image
            ImageHelper::deleteImage('/images/supporter/' . $supporter->image);

             // Upload new image
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/supporter/');
            $validateData ['image'] = $imageName;
        }
        // Update data
        $supporter->update($validateData);

        // Redirect
        return redirect()->route('supporters.index')->withSuccess('supporter Information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supporter $supporter)
    {
        if($supporter->image){
            // Delete image
            ImageHelper::deleteImage('/images/supporter/' . $supporter->image);
        }
        $supporter->delete();
        return back()->with('success','supporter Information deleted');
    }
}
