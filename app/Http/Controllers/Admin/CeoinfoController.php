<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\CeoInfo;
use Illuminate\Http\Request;

class CeoinfoController extends Controller
{
    public function index()
    {
        $ceo = CeoInfo::all();
        return view('admin.ceo-info.edit',[
            'ceo'=> $ceo, 
        ]);
    }

    public function update(Request $request)
    {
        $ceo = CeoInfo::find($request->id);

        $rules = [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'vdo_link' => 'required', 
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:4096',
        ];

        // Validate input data
        $validatedData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            // Delete previous image
            ImageHelper::deleteImage('/images/ceo/' . $ceo->image);

            // Upload new image
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/ceo/');
            $validatedData['image'] = $imageName;
        }

        // Update data in the database
        $ceo->update($validatedData);

        
        return back()->withSuccess('Update successful');

    }

}
