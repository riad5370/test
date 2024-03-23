<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Success;
use App\Models\SuccessBasic;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $success = Success::all();
        return view('admin.success.index',[
            'success'=>$success
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.success.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'details' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/success/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        Success::create($validateData);

        //redirect
        return redirect()->route('oursuccess.index')->withSuccess('New record create Successfull!');
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
    public function edit(Success $oursuccess)
    {
        return view('admin.success.edit',[
            'success'=> $oursuccess, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Success $oursuccess)
    {
        $rules = [
            'name' => 'required|string',
            'details' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            // Delete previous image
            ImageHelper::deleteImage('/images/success/' . $oursuccess->image);

            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/success/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        $oursuccess->update($validateData);

        //redirect
        return redirect()->route('oursuccess.index')->withSuccess('record Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Success $oursuccess)
    {
        if($oursuccess->image){
            // Delete image
            ImageHelper::deleteImage('/images/success/' . $oursuccess->image);
        }
        $oursuccess->delete();
        return back()->with('success','deleted');
    }

    public function basicInfo(){
        $success = SuccessBasic::first();
        return view('admin.success.basic',[
            'success'=>$success
        ]);
    }
    public function basicUpdate(Request $request){
        $ceo = SuccessBasic::find($request->id);

        $rules = [
            'title' => 'required|string',
            'details' => 'required|string',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:4096',
        ];

        // Validate input data
        $validatedData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            // Delete previous image
            ImageHelper::deleteImage('/images/successBasic/' . $ceo->image);

            // Upload new image
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/successBasic/');
            $validatedData['image'] = $imageName;
        }

        // Update data in the database
        $ceo->update($validatedData);

        
        return back()->withSuccess('Update successful');
    }
}
