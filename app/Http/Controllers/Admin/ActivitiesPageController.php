<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivitieImage;
use App\Helpers\ImageHelper;
use App\Models\BasicActivitie;

class ActivitiesPageController extends Controller
{
    public function index()
    {
        $activitieGalleys = ActivitieImage::all();
        return view('admin.activitieGallery.index',[
           'activitieGalleys'=>$activitieGalleys
        ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/activitieGallery/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        ActivitieImage::create($validateData);

        //redirectP
        return back()->withSuccess('New Activitie Added!');
    }
    public function destroy(Request $request, $id)
    {
        $activitieGalle = ActivitieImage::find($id);
        if($activitieGalle->image){
            // Delete image
            ImageHelper::deleteImage('/images/activitieGallery/' . $activitieGalle->image);
        }
        $activitieGalle->delete();
        return back()->with('delete','deleted');
    }

    //basic-info
    public function basic()
    {
        $activitiebasic = BasicActivitie::first();
        return view('admin.activitieGallery.basicinfo',[
           'activitiebasic'=>$activitiebasic
        ]);
    }

    public function basicStoreUpdate(Request $request)
    {
        
        $bacicActivit = BasicActivitie::find($request->id);
        // return $bacicActivit->id;
        $rules = [
            'title' => 'required|string',
            'details' => 'required|string',
            'gallery_header' => 'required|string', 
            'gallery_header' => 'required|string', 
            'vdo_header' => 'required|string',
            'vdo_link' => 'required|string',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        // Validate input data
        $validatedData = $request->validate($rules);
        //image handle
        if($bacicActivit->image == null){
            if($request->image == ''){
                $bacicActivit->update($validatedData);
                return back()->withSuccess('Update successful');
            }else{
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/images/basicActivitie/'), $imageName);
                $validatedData['image'] = $imageName;
                $bacicActivit->update($validatedData);
                // $widget->update(['image' => $imageName]);
                return back()->withSuccess('Update successful');
            }
        }
        else{
            if($request->image == ''){
                $bacicActivit->update($validatedData);
                return back()->withSuccess('Update successful');
            }else{
                if(file_exists('images/basicActivitie/'.$bacicActivit->image)){
                    unlink(public_path('images/basicActivitie/'.$bacicActivit->image));  
                }
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/images/basicActivitie/'), $imageName);
                $validatedData['image'] = $imageName;
                $bacicActivit->update($validatedData);
                return back()->withSuccess('Update successful');
            }
        }
    }    
}
