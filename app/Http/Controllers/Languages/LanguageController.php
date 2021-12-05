<?php

namespace App\Http\Controllers\Languages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch(Request $request,$locale){
        if (!in_array($locale, ['en', 'ar'])){
            $locale = 'en';
        }
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
