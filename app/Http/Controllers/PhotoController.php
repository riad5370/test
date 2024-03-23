<?php

namespace App\Http\Controllers;

use App\Models\albumPhotoGallery;
use App\Models\Newsletter;
use App\Models\PhotoAlbum;
use App\Models\PhotoYear;
use App\Models\Videos;

class PhotoController extends Controller
{
    //photo-gallery-page
    public function photo(){
        $photos = PhotoAlbum::all();
        return view('website.page.photoGallery',[
            'photos'=>$photos,
            'years'=>PhotoYear::all()
        ]);
    }

    public function photoDetails($id){
        $photoDetails = PhotoAlbum::find($id);
        $photoGallery = albumPhotoGallery::where('photo_album_id',$id)->get();
        return view('website.page.photoDetails',[
            'photoDetails'=>$photoDetails,
            'photoGallery'=>$photoGallery,
        ]);
    }

    //newsletter-page
    public function newsLetter(){
        $newsLetters = Newsletter::all();
        return view('website.page.newsletter',[
            'newsLetters'=>$newsLetters
        ]);
    }


    //videos-section  
    public function videos(){
        $videos = Videos::all();
        return view('website.page.videos',[
            'videos'=>$videos
        ]);
    }
}
