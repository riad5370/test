<?php

namespace App\Http\Controllers\Admin\Gusthouse;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\GuestGalleryImage;
use App\Models\GuestHouseBasic;
use Illuminate\Http\Request;

class GuestHouseBasicController extends Controller
{
    public function index()
    {
        $guestGalleys = GuestGalleryImage::all();
        return view('admin.guestHouse.guestGallery.index',[
           'guestGalleys'=>$guestGalleys
        ]);
    }
    public function storeGall(Request $request)
    {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];        
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/guestHouseGallery/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        GuestGalleryImage::create($validateData);

        //redirectP
        return back()->withSuccess('New guestHouse Gallery Image Added!');
    }
    public function destroy(Request $request, $id)
    {
     
        $guestGalle = GuestGalleryImage::find($id);
        if($guestGalle->image){
            // Delete image
            ImageHelper::deleteImage('/images/guestHouseGallery/' . $guestGalle->image);
        }
        $guestGalle->delete();
        return back()->with('delete','deleted');
    }

     //basic-info
     public function basic()
     {
         $activitiebasic = GuestHouseBasic::first();
         return view('admin.guestHouse.guestGallery.basicinfo',[
            'activitiebasic'=>$activitiebasic
         ]);
     }
 
     public function basicStoreUpdate(Request $request)
     {
         $bacicGallery = GuestHouseBasic::find($request->id);
         // return $bacicActivit->id;
         $rules = [
             'name' => 'required|string',
             'title' => 'required|string',
             'details' => 'required|string',
             'slideDownDetails' => 'required|string', 
             'vdo_link' => 'required|string', 
             'bottom_content' => 'required|string',
             'image' => 'file|mimes:jpeg,png,jpg,gif|max:4096',
         ];
         // Validate input data
         $validatedData = $request->validate($rules);
         //image handle
         if($bacicGallery->image == null){
             if($request->image == ''){
                 $bacicGallery->update($validatedData);
                 return back()->withSuccess('Update successful');
             }else{
                 $image = $request->file('image');
                 $imageName = time().'.'.$image->getClientOriginalExtension();
                 $image->move(public_path('/images/basicGallery/'), $imageName);
                 $validatedData['image'] = $imageName;
                 $bacicGallery->update($validatedData);
                 // $widget->update(['image' => $imageName]);
                 return back()->withSuccess('Update successful');
             }
         }
         else{
             if($request->image == ''){
                 $bacicGallery->update($validatedData);
                 return back()->withSuccess('Update successful');
             }else{
                 if(file_exists('images/basicGallery/'.$bacicGallery->image)){
                     unlink(public_path('images/basicGallery/'.$bacicGallery->image));  
                 }
                 $image = $request->file('image');
                 $imageName = time().'.'.$image->getClientOriginalExtension();
                 $image->move(public_path('/images/basicGallery/'), $imageName);
                 $validatedData['image'] = $imageName;
                 $bacicGallery->update($validatedData);
                 return back()->withSuccess('Update successful');
             }
         }
     }
 

}
