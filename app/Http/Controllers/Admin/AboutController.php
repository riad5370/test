<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AboutBasic;
use App\Models\AboutMissionImage;
use App\Models\BankInfo;
use App\Models\MissinVissinImage;
use App\Models\WhatWeAreImage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
     //basic-info
     public function basic()
     {
         $activitiebasic = AboutBasic::first();
         return view('admin.aboutBasic.basicinfo',[
            'activitiebasic'=>$activitiebasic
         ]);
     }
 
     public function Update(Request $request)
     {
         $bacicAbout = AboutBasic::find($request->id);
         $rules = [
            'title' => 'required|string',
            'we_are_content' => 'required|string',
            'we_do_content' => 'required|string',
            'missionContent' => 'required|string',
            'vishionContent' => 'required|string',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:4096',
         ];
         // Validate input data
         $validatedData = $request->validate($rules);
         //image handle
         if($bacicAbout->image == null){
             if($request->image == ''){
                 $bacicAbout->update($validatedData);
                 return back()->withSuccess('Update successful');
             }else{
                 $image = $request->file('image');
                 $imageName = time().'.'.$image->getClientOriginalExtension();
                 $image->move(public_path('/images/basicAbout/'), $imageName);
                 $validatedData['image'] = $imageName;
                 $bacicAbout->update($validatedData);
                 return back()->withSuccess('Update successful');
             }
         }
         else{
             if($request->image == ''){
                 $bacicAbout->update($validatedData);
                 return back()->withSuccess('Update successful');
             }else{
                 if(file_exists('images/basicAbout/'.$bacicAbout->image)){
                     unlink(public_path('images/basicAbout/'.$bacicAbout->image));  
                 }
                 $image = $request->file('image');
                 $imageName = time().'.'.$image->getClientOriginalExtension();
                 $image->move(public_path('/images/basicAbout/'), $imageName);
                 $validatedData['image'] = $imageName;
                 $bacicAbout->update($validatedData);
                 return back()->withSuccess('Update successful');
             }
         }
     }  
     
     
     //basic-image
     public function basicImage()
     {
        $missinVissions = MissinVissinImage::all();
        $weAres = AboutMissionImage::all();
        return view('admin.aboutBasic.basicImage',[
            'missinVissions'=>$missinVissions,
            'weAres'=>$weAres,
        ]);
     }
    //we are image
    public function weAreImage()
     {
        $weAres = WhatWeAreImage::all();
        return view('admin.aboutBasic.weAre',[
            'weAres'=>$weAres,
        ]);
     }
     public function basicWeAreImage(Request $request)
     {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/weAre/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        WhatWeAreImage::create($validateData);

        //redirect
        return back()->withSuccess('New Image Added Successfull!');
     }

     //mission/vission

     //mission
     public function basicMissionImage(Request $request)
     {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/mission/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        AboutMissionImage::create($validateData);

        //redirect
        return back()->withSuccess('New Image Added Successfull!');
     }

     //vission
     public function basicMissionVissionImage(Request $request)
     {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/missionVission/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        MissinVissinImage::create($validateData);

        //redirect
        return back()->withSuccess('New Image Added Successfull!');
     }

     //destroy
     
     public function weareDestroy(Request $request, $id){
        $id = WhatWeAreImage::find($id);
        if($id->image){
            // Delete image
            ImageHelper::deleteImage('/images/weAre/' . $id->image);
        }
        $id->delete();
        return back()->with('success','deleted');
     }
     public function missionMainDelete(Request $request, $id){
        $id = AboutMissionImage::find($id);
        if($id->image){
            // Delete image
            ImageHelper::deleteImage('/images/mission/' . $id->image);
        }
        $id->delete();
        return back()->with('success','deleted');
     }
     public function missionDelete(Request $request, $id){
        $id = MissinVissinImage::find($id);
        if($id->image){
            // Delete image
            ImageHelper::deleteImage('/images/missionVission/' . $id->image);
        }
        $id->delete();
        return back()->with('success','deleted');
     }
     //bank-info
     public function bankInfo(){
        $bank = BankInfo::first();
        return view('admin.bankInfo.basic',[
            'bank'=>$bank
        ]);
     }

    public function bankUpdate(Request $request){
        $ceo = BankInfo::find($request->id);

        $rules = [
            'accountName' => 'required|string',
            'bankName' => 'required|string',
            'accountNumber' => 'required|string',
            'swiftCode' => 'required|string',
            'address' => 'required|string', 
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:4096',
        ];

        // Validate input data
        $validatedData = $request->validate($rules);
        // Update data in the database
        $ceo->update($validatedData);

        
        return back()->withSuccess('Update successful');
    }

}
