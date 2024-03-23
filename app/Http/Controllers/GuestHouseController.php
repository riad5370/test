<?php

namespace App\Http\Controllers;

use App\Models\GuestGalleryImage;
use App\Models\GuestHouseBasic;
use App\Models\GuestHouseOtherPackege;
use App\Models\GuestHousePackege;
use App\Models\guetHouseEditableImage;
use App\Models\Widget;
use Illuminate\Http\Request;

class GuestHouseController extends Controller
{
    public function guestHouse(){
        $guestBasic = GuestHouseBasic::first();
        return view('website.page.guesthouse',[
            'guestBasic'=>$guestBasic,
            'widget'=>Widget::first(),
            'galleryImage'=>GuestGalleryImage::all(),
            'packeges'=>GuestHousePackege::all(),
            'otherPackege'=>GuestHouseOtherPackege::all(),
            'guestEdiatableImage'=>guetHouseEditableImage::first(),
        ]);
    }
}
