<?php

namespace App\Http\Controllers;

use App\Models\BankInfo;
use App\Models\ContactBasicInfo;
use App\Models\Widget;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactPage(){
        return view('website.page.contact',[
            'widget'=>Widget::first(),
            'bankInfo'=>BankInfo::first(),
            'ContactBasicInfo'=>ContactBasicInfo::first(),
        ]);
    }
}

