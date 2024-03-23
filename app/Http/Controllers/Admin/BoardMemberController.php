<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = BoardMember::all();
        return view('admin.boardMember.index',[
            'staffs'=> $staffs, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.boardMember.create');
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
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/boardMember/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        BoardMember::create($validateData);

        //redirect
        return back()->withSuccess('New Member created successfully!');
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
    public function edit(BoardMember $boardmember)
    {
        return view('admin.boardMember.edit',[
            'staff'=> $boardmember, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BoardMember $boardmember)
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
            // Delete previous image
            ImageHelper::deleteImage('/images/boardMember/' . $boardmember->image);

            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/boardMember/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        $boardmember->update($validateData);
        //redirect
        return redirect()->route('boardmembers.index')->withSuccess('Member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BoardMember $boardmember)
    {
        if($boardmember->image){
            // Delete image
            ImageHelper::deleteImage('/images/boardMember/' . $boardmember->image);
        }
        $boardmember->delete();
        return back()->with('success','Your Record Has been deleted');
    }
}
