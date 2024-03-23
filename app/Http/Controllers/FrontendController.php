<?php

namespace App\Http\Controllers;

use App\Models\AboutBasic;
use App\Models\AboutMissionImage;
use App\Models\Activitie;
use App\Models\ActivitieImage;
use App\Models\ActivitieOther;
use App\Models\ActivitiePrograms;
use App\Models\BasicActivitie;
use App\Models\BoardMember;
use App\Models\Category;
use App\Models\CeoInfo;
use App\Models\Donar;
use App\Models\Facility;
use App\Models\MissinVissinImage;
use App\Models\Product;
use App\Models\ProductBasic;
use App\Models\Slider;
use App\Models\Staff;
use App\Models\Success;
use App\Models\SuccessBasic;
use App\Models\Supporter;
use App\Models\Thumbnail;
use App\Models\WhatWeAreImage;
use App\Models\Widget;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    //index-page
    public function index(){
        $widget = Widget::first();
        $ceo = CeoInfo::first();
        $sliders = Slider::all();
        $supporters = Supporter::all();
        $activities = Activitie::all();
        return view('website.index',[
            'sliders'=>$sliders,
            'activities'=>$activities,
            'widget'=>$widget,
            'ceo'=>$ceo,
            'supporters'=>$supporters,
        ]);
    }
    //product-page
    public function categoryProduct($id){
        $category_name = Category::find($id);
        $category_products = Product::where('category_id', $id)->paginate('16');
        return view('website.page.category-product',[
            'category_products'=>$category_products,
            'category_name' => $category_name,
            'productBasict'=>ProductBasic::first()
        ]);
    }

    public function details($slug) {
        $product_info = Product::where('slug', $slug)->first();
        if (!$product_info) {
            abort(404); 
        }
        $thumbnails = Thumbnail::where('product_id', $product_info->id)->get();

        $related_products = Product::where('category_id', $product_info->category_id)->where('id', '!=', $product_info->id)->get();
    
        return view('website.page.product_details', [
            'product_info' => $product_info,
            'thumbnails' => $thumbnails,
            'related_products' => $related_products,
            'productBasict'=>ProductBasic::first()
        ]);
    }

    //about-page
    public function aboutUs() {
        $missions = AboutMissionImage::all();
        $visions = MissinVissinImage::orderBy('id', 'DESC')->get();
        return view('website.page.aboutUs',[
            'missions'=>$missions,
            'visions'=>$visions,
            'facilities'=>Facility::all(),
            'staffs'=>Staff::all(),
            'donars'=>Donar::all(),
            'aboutBasic'=>AboutBasic::first(),
            'aboutWeAres'=>WhatWeAreImage::all(),
            'members'=>BoardMember::all(),
        ]);
    }
    //activitiePage
    public function activitiePage() {
        $activitiImages = ActivitieImage::all();
        $activitiBasic = BasicActivitie::first();
        $activitiPrograms = ActivitiePrograms::all();
        $activitiOthers = ActivitieOther::all();
        return view('website.page.activities',[
            'activitiImages'=>$activitiImages,
            'activitiBasic'=>$activitiBasic,
            'activitiPrograms'=>$activitiPrograms,
            'activitiOthers'=>$activitiOthers,
        ]);
    }
    //success-page
    public function ourSuccess() {
        $success = Success::all();
        $successBasic = SuccessBasic::first();
        return view('website.page.success',[
            'success'=>$success,
            'successBasic'=>$successBasic,
        ]);
    }

}
