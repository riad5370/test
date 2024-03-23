<?php

namespace App\Http\Controllers\Admin\Latest;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\PhotoYear;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newletters = Newsletter::all();
        return view('admin.latest.newsletter.albumNewsletter.index',[
            'albums'=>$newletters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = PhotoYear::all();
        return view('admin.latest.newsletter.albumNewsletter.create',[
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
            'title' => 'required|string',
            'details' => 'required|string',
            'online_link' => 'required|string',
            'download_link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/latest/newsletter/');
            $validateData ['image'] = $imageName;
        }
        Newsletter::create($validateData);

        return redirect()->route('newsletters.index')->withSuccess('new Newsletter created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        $years = PhotoYear::all();
        return view('admin.latest.newsletter.albumNewsletter.edit',[
            'years'=>$years,
            'newsletter'=>$newsletter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $rules = [
            'year_id' => 'required',
            'title' => 'required|string',
            'details' => 'required|string',
            'online_link' => 'required|string',
            'download_link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
        ];
        //validate check request data
        $validateData = $request->validate($rules);

        // Image management using helper function
        if ($request->hasFile('image')) {
            ImageHelper::deleteImage('/images/latest/newsletter/' . $newsletter->image);
            $imageName = ImageHelper::uploadImage($request->file('image'), '/images/latest/newsletter/');
            $validateData ['image'] = $imageName;
        }
        $newsletter->update($validateData);

        return redirect()->route('newsletters.index')->withSuccess('Newsletter updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        if ($newsletter->image) {
            // Delete preview image
            ImageHelper::deleteImage('/images/latest/newsletter/' . $newsletter->image);
        }
        $newsletter->delete();
        return back()->with('success', 'Your Record Has been deleted');
    }
}
