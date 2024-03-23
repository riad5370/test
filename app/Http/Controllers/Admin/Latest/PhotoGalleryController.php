<?php

namespace App\Http\Controllers\Admin\Latest;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\albumPhotoGallery;
use App\Models\PhotoAlbum;
use App\Models\PhotoYear;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = PhotoAlbum::all();
        return view('admin.latest.photos.albumPhoto.index',[
            'albums'=>$albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = PhotoYear::all();
        return view('admin.latest.photos.albumPhoto.create',[
            'years'=>$years
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'year_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'vdo_link' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/latest/photoAlbum/');
            $validateData ['image'] = $imageName;
        }
        // Store data
        $albumPhoto = PhotoAlbum::create($validateData);

            // album photo images
            if ($request->hasFile('albumGalleryImage')) {
                foreach($request->albumGalleryImage as $thumbnail) {
                    $imageName = Str::random(3).rand(100,999).$albumPhoto->id.'.'.$thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('/images/latest/photoGalleryImg/'), $imageName);
                albumPhotoGallery::create([
                    'photo_album_id' => $albumPhoto->id,
                    'albumGalleryImage' => $imageName,
                    'created_at' => Carbon::now(),
                ]);
                }
            }

        //redirect
        return redirect()->route('latesphotos.index')->withSuccess('new album photo created!');
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
    public function edit(PhotoAlbum $latesphoto)
    {
        return view('admin.latest.photos.albumPhoto.edit',[
            'latesphoto'=>$latesphoto,
            'years' => PhotoYear::all(),
            'photos' => albumPhotoGallery::where('photo_album_id',$latesphoto->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoAlbum $latesphoto)
    {
        $rules = [
            'year_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'vdo_link' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
         //preview image manage
         if ($request->hasFile('image')) {
            ImageHelper::deleteImage('/images/latest/photoAlbum/' . $latesphoto->image);
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/latest/photoAlbum/');
            // dd($imageName); // Uncomment this line if you still want to debug the image name
            $validateData['image'] = $imageName;
        }
        $latesphoto->update($validateData);


            // album photo images
        $thumbnails = albumPhotoGallery::where('photo_album_id', $latesphoto->id)->get();
        if ($request->hasFile('albumGalleryImage')) {
            foreach ($thumbnails as $thumbnail) {
                // Delete existing thumbnails
                ImageHelper::deleteImage('/images/latest/photoGalleryImg/' . $thumbnail->albumGalleryImage);
                $thumbnail->delete();
            }
            foreach ($request->file('albumGalleryImage') as $thumbnailFile) {
                $imageName = Str::random(3) . rand(100, 999) . $latesphoto->id . '.' . $thumbnailFile->getClientOriginalExtension();
                $thumbnailFile->move(public_path('/images/latest/photoGalleryImg/'), $imageName);
                albumPhotoGallery::updateOrCreate(
                    ['photo_album_id' => $latesphoto->id, 'albumGalleryImage' => $imageName],
                    ['created_at' => Carbon::now()]
                );
            }
        }
        //redirect
        return redirect()->route('latesphotos.index')->withSuccess('album photo updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoAlbum $latesphoto)
    {
        if ($latesphoto->image) {
            // Delete preview image
            ImageHelper::deleteImage('/images/latest/photoAlbum/' . $latesphoto->image);
        }
    
        // Thumbnail image delete
        $thumbnails = albumPhotoGallery::where('photo_album_id', $latesphoto->id)->get();
        foreach ($thumbnails as $thumbnail) {
            $delete_thum = $thumbnail->albumGalleryImage;
            // Rest of the code for deleting thumbnails
            ImageHelper::deleteImage('/images/latest/photoGalleryImg/' . $delete_thum);
            $thumbnail->delete();
        }
    
        $latesphoto->delete();
        return back()->with('success', 'Your Record Has been deleted');
    }

    //year-add
    public function yearPhoto()
    {
        $years = PhotoYear::all();
        return view('admin.latest.photos.year.index',[
            'years'=>$years
        ]);
    }

    public function yearPhotoStore(Request $request){
        $rule = [
            'year'=>'required',
        ];
        $validateData = $request->validate($rule);
        PhotoYear::create($validateData);
        return back()->withSuccess('Year has been Created');
    }

    public function deteleYear(Request $request)
    {
        $year = PhotoYear::findOrFail($request->id);
        $year->delete();
        return back()->withDelete('Year has been deleted');
    }

}
