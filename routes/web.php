<?php

use App\Http\Controllers\ActivitieOtherController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ActivitieGalleryController;
use App\Http\Controllers\Admin\ActivitieProgramController;
use App\Http\Controllers\Admin\ActivitiesController;
use App\Http\Controllers\Admin\ActivitiesPageController;
use App\Http\Controllers\Admin\BoardMemberController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CeoinfoController;
use App\Http\Controllers\Admin\DonarController;
use App\Http\Controllers\Admin\FacilitiesController;
use App\Http\Controllers\Admin\Gusthouse\GuesHouseOtherPackegeController;
use App\Http\Controllers\Admin\Gusthouse\GuestHouseBasicController;
use App\Http\Controllers\Admin\Gusthouse\GuestHousePackegeController;
use App\Http\Controllers\Admin\Latest\NewsletterController;
use App\Http\Controllers\Admin\Latest\PhotoGalleryController;
use App\Http\Controllers\Admin\Latest\VideosController;
use App\Http\Controllers\Admin\MenubarController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SuccessController;
use App\Http\Controllers\Admin\SupporterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WidgetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerMailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GuestHouseController;
use App\Http\Controllers\PhotoController;
use App\Models\GuestHouseOtherPackege;
use Illuminate\Support\Facades\Route;



//start route//
Route::get('/',[FrontendController::class,'index'])->name('index');
//about-us
Route::get('/about-us',[FrontendController::class,'aboutUs'])->name('aboutus');
//activities-us
Route::get('/activities-pages',[FrontendController::class,'activitiePage'])->name('activitiepage');
//success-
Route::get('/our-success',[FrontendController::class,'ourSuccess'])->name('oursuccess');
//product
Route::get('/category/product/{id}',[FrontendController::class,'categoryProduct'])->name('category.product');
Route::get('/product-details/{slug}',[FrontendController::class,'details'])->name('details');
//contact
Route::get('/contact',[ContactController::class,'contactPage'])->name('contact');

//the-latest-photo-section
Route::get('/photo-gallery',[PhotoController::class,'photo'])->name('photo.gallery');
Route::get('/photo-gallery-details/{id}',[PhotoController::class,'photoDetails'])->name('photo.details');
//the-latest-news-letter-section
Route::get('/news-letter',[PhotoController::class,'newsLetter'])->name('news.letter');
//the-latest-Videos-section
Route::get('/latest-videos',[PhotoController::class,'videos'])->name('latest.videos');
//gueshouse
Route::get('/guesthouse',[GuestHouseController::class,'guestHouse'])->name('guest.house');

//customar mail
Route::Post('/cutomer/mail',[CustomerMailController::class,'mailSent'])->name('mail.sent');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    //slider
    Route::resource('menubars',MenubarController::class);
    //slider
    Route::resource('sliders',SliderController::class);
    //activities
    Route::resource('activities',ActivitiesController::class);
    //ceo-information
    Route::get('/ceos',[CeoinfoController::class,'index'])->name('ceos.index');
    Route::post('/ceos/update',[CeoinfoController::class,'update'])->name('ceos.update');
    //supporter
    Route::resource('supporters',SupporterController::class);
    //board member
    Route::resource('boardmembers',BoardMemberController::class);
    //staff
    Route::resource('staffs',StaffController::class);
    //donar
    Route::resource('donars',DonarController::class);

    //product-section
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::get('/product/basic-info',[ProductController::class,'basicInfo'])->name('product.basic');
    Route::post('/product/basic-update',[ProductController::class,'basicUpdate'])->name('product.update');

    //company-Settings
    Route::get('/widgets',[WidgetController::class,'index'])->name('widgets.index');
    Route::post('/widgets/update',[WidgetController::class,'update'])->name('widgets.update');
    Route::get('/widgets/logo',[WidgetController::class,'logo'])->name('widgets.logo');
    Route::post('/widgets/logo/update',[WidgetController::class,'logoUpdate'])->name('logo.update');
    //footer-image
    Route::get('/footer/image',[WidgetController::class,'footer'])->name('footer.image');
    Route::post('/footer/image/update',[WidgetController::class,'footerUpdate'])->name('footer.update');
    //contact-basic-info
    Route::get('/contact-basic',[WidgetController::class,'contactBasic'])->name('contact.basic');
    Route::post('/contact-basic-update',[WidgetController::class,'contactBasicUpdate'])->name('contact.basic.update');

    //facilities
    Route::resource('facilities',FacilitiesController::class);

    //start-about-section......................................
    //about basic info
    Route::get('/about/basic',[AboutController::class,'basic'])->name('aboutbasics.basic');
    Route::post('/about/basic/storeUpdate',[AboutController::class,'Update'])->name('aboutbasics.store');
    //about-image-section
    Route::get('/about/basic/image',[AboutController::class,'basicImage'])->name('aboutbasics.image');
    //mission
    Route::post('/about/basic/mission-image',[AboutController::class,'basicMissionImage'])->name('mission.image');
    Route::post('/about/basic/missinmain/delete/{id}',[AboutController::class,'missionMainDelete'])->name('missionmain.delete');
    //vission
    Route::post('/about/basic/mission-vission-image',[AboutController::class,'basicMissionVissionImage'])->name('mivi.imag');
    Route::post('/about/basic/missin/delete/{id}',[AboutController::class,'missionDelete'])->name('mission22.delete');
    //we are image
    Route::get('/about/basic/who-we-are-image',[AboutController::class,'weAreImage'])->name('basics.we.are.image');
    Route::post('/about/basic/we-are-image',[AboutController::class,'basicWeAreImage'])->name('weare.image');
    Route::post('/about/basic/weare-image-destroy/{id}',[AboutController::class,'weareDestroy'])->name('weare.destroy');
    //bank-information
    Route::get('/about/bank-info',[AboutController::class,'bankInfo'])->name('bank.info');
    Route::post('/about/bank-update',[AboutController::class,'bankUpdate'])->name('bank.update');
    //end about section.............................................

    //start-our-success-section.....................................
    Route::resource('oursuccess',SuccessController::class);
    Route::get('/success/basic-info',[SuccessController::class,'basicInfo'])->name('success.basic');
    Route::post('/success/basic-update',[SuccessController::class,'basicUpdate'])->name('success.update');
    //end-our-success-section.......................................

    //start-the-latest-section.....................................
     Route::resource('latesphotos',PhotoGalleryController::class);
     Route::get('/latesphotos-year',[PhotoGalleryController::class,'yearPhoto'])->name('year.photo');
     Route::post('/latesphotos-year-store',[PhotoGalleryController::class,'yearPhotoStore'])->name('year.photostore');
     Route::post('/latesphotos-year-delete',[PhotoGalleryController::class,'deteleYear'])->name('year.delete');
     //newsletter
    Route::resource('newsletters',NewsletterController::class);
   //video-section
   Route::resource('videos',VideosController::class);
   //end-the-latest-section.......................................


    //activitie-section-start//////////////////////////////
    Route::resource('activitieprograms',ActivitieProgramController::class);
    Route::resource('activitieothers',ActivitieOtherController::class);
    //gallery-image
    Route::get('/activitie/gallerys',[ActivitiesPageController::class,'index'])->name('activitiegallerys.index');
    Route::post('/activitie/store',[ActivitiesPageController::class,'store'])->name('activitiegallerys.store');
    Route::post('/activitie/destroy/{id}',[ActivitiesPageController::class,'destroy'])->name('activitiegallerys.destroy');
    //activitie basic info
    Route::get('/activitie/basic',[ActivitiesPageController::class,'basic'])->name('activitiebasics.basic');
    Route::post('/activitie/basic/storeUpdate',[ActivitiesPageController::class,'basicStoreUpdate'])->name('activitiebasics.store');
    ///////end activitie////////////////////////////////

    //guest house start.......................................
    //gallery-image
    Route::get('/guesthouse/gallerys',[GuestHouseBasicController::class,'index'])->name('gursthouesegallerys.index');
    Route::post('/guesthouse/store',[GuestHouseBasicController::class,'storeGall'])->name('gursthouesegallerysimg.store');
    Route::post('/guesthouse/destroy/{id}',[GuestHouseBasicController::class,'destroy'])->name('gursthouesegallerys.destroy');
    //gallery basic info
    Route::get('/gallery/basic',[GuestHouseBasicController::class,'basic'])->name('gursthouesegallerys.basic');
    Route::post('/gallery/basic/storeUpdate',[GuestHouseBasicController::class,'basicStoreUpdate'])->name('gursthouesegallerys.store');
    //guest-house-packege
    Route::resource('guesthousepackege',GuestHousePackegeController::class);
    //guest-house-other-packege
    Route::resource('guesthouseotherpackege',GuesHouseOtherPackegeController::class);
    //guest-house-editable-image
    Route::get('/guest-editable-image',[GuesHouseOtherPackegeController::class,'GuestEditableImage'])->name('guest.edtable.image');
    Route::post('/guest-editable-image-update',[GuesHouseOtherPackegeController::class,'GuestEditableImageUpdate'])->name('guest.edtable.image.update');
    //guest house end.......................................


    //profile-setting
    Route::post('/widgets/update',[WidgetController::class,'update'])->name('widgets.update');
    //profile-setting
    Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
    Route::post('/profile-baicInfo-change', [ProfileController::class, 'infoUpdate'])->name('info.update');
    Route::post('/profile-password-update', [ProfileController::class, 'passwordUpdate'])->name('profile.password.update');

    //user
    Route::get('/user-create',[UserController::class,'create'])->name('user.create');
    Route::post('/user-store',[UserController::class,'store'])->name('user.store');
    Route::post('/user-delete/{id}',[UserController::class,'delete'])->name('user.delete');
});
