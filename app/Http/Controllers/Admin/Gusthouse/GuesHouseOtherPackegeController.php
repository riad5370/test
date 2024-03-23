<?php

namespace App\Http\Controllers\Admin\Gusthouse;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\GuestHouseOtherPackege;
use App\Models\guetHouseEditableImage;
use Database\Seeders\GuestHouseBasicSeeder;
use Illuminate\Http\Request;

class GuesHouseOtherPackegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packeges = GuestHouseOtherPackege::all();
        return view('admin.guestHouse.guestOtherPackege.index',[
            'albums'=>$packeges
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guestHouse.guestOtherPackege.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'head'=> 'required|string',
            'title'=> 'required|string',
            'details'=> 'required|string',
            'price'=> 'required|numeric',
        ];
        $validateData = $request->validate($rules);

        GuestHouseOtherPackege::create($validateData);
        return redirect()->route('guesthouseotherpackege.index')->withSuccess('packege create successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function GuestEditableImage(){
        $logo = guetHouseEditableImage::first();
        return view('admin.guestHouse.guestGallery.guest_editable_image',[
            'logo'=>$logo
        ]);
    }

    public function GuestEditableImageUpdate(Request $request){
        $rules = [
            'imageOne' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'imageTwo' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'imageThree' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'imageFour' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        
        // Validate request data
        $validatedData = $request->validate($rules);
        
        $imageFields = ['imageOne' => '/folder1/', 'imageTwo' => '/folder2/', 'imageThree' => '/folder3/', 'imageFour' => '/folder4/'];

        foreach ($imageFields as $field => $folder) {
            if ($request->hasFile($field)) {
                // Delete previous image
                $previousImage = guetHouseEditableImage::find($request->id);
                if ($previousImage) {
                    ImageHelper::deleteImage('/images/guetHouseEditableImage/' . $previousImage->{$field});
                }
        
                // Upload new image to the specified folder
                $imageName = ImageHelper::uploadImage($request->file($field), '/images/guetHouseEditableImage/' . $folder);
                $validatedData[$field] = $imageName;
            }
        }
        
        // Update or create data
        guetHouseEditableImage::updateOrCreate(['id' => $request->id], $validatedData);
        
        // Redirect
        return back()->withSuccess('Images updated successfully!');
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuestHouseOtherPackege $guesthouseotherpackege)
    {
        return view('admin.guestHouse.guestOtherPackege.edit',[
            'guesthousepackege'=>$guesthouseotherpackege
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuestHouseOtherPackege $guesthouseotherpackege)
    {
        $rules = [
            'head'=> 'required|string',
            'title'=> 'required|string',
            'details'=> 'required|string',
            'price'=> 'required|numeric',
        ];
        $validateData = $request->validate($rules);

        $guesthouseotherpackege->update($validateData);
        return redirect()->route('guesthouseotherpackege.index')->withSuccess('packege update successfull!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestHouseOtherPackege $guesthouseotherpackege)
    {
        $guesthouseotherpackege->delete();
        return back()->withSuccess('deleted!');
    }
}
