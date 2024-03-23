<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('admin.staff.index',[
            'staffs'=> $staffs, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
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
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/staffs/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        Staff::create($validateData);

        //redirect
        return back()->withSuccess('New Staff created successfully!');
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
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit',[
            'staff'=> $staff, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $rules = [
            'name' => 'required|unique:staff,name,'.$staff->id,
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
            ImageHelper::deleteImage('/images/staffs/' . $staff->image);

            // Upload new image
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/staffs/');
            $validateData['image'] = $imageName;
        }
        // update data
        $staff->update($validateData);

        //redirect
        return redirect()->route('staffs.index')->withSuccess('Staff updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        if($staff->image){
            // Delete image
            ImageHelper::deleteImage('/images/staffs/' . $staff->image);
        }
        $staff->delete();
        return back()->with('success','Your Record Has been deleted');
    }
}
