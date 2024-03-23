<?php

namespace App\Http\Controllers\Admin\Latest;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Videos;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newletters = Videos::all();
        return view('admin.latest.videos.index',[
            'albums'=>$newletters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.latest.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/latest/videos/');
            $validateData ['image'] = $imageName;
        }
        Videos::create($validateData);

        return redirect()->route('videos.index')->withSuccess('new videos created!');
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
    public function edit(Videos $video)
    {
        return view('admin.latest.videos.edit',[
            'albums'=>$video
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videos $video)
    {
        $rules = [
            'title' => 'required|string',
            'link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            ImageHelper::deleteImage('/images/latest/videos/' . $video->image);
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/latest/videos/');
            $validateData ['image'] = $imageName;
        }
        $video->update($validateData);

        return redirect()->route('videos.index')->withSuccess('videos updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videos $video)
    {
        if ($video->image) {
            // Delete preview image
            ImageHelper::deleteImage('/images/latest/videos/' . $video->image);
        }
        $video->delete();
        return back()->with('success', 'Your Record Has been deleted');
    }
}
