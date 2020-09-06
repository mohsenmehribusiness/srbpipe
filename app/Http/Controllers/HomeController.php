<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\laboratory;
use Illuminate\Http\Request;
use App\about;
use App\send;
use App\section;
use App\Iso;
use App\imagee;
use App\Catalog;
//use Illuminate\Support\Facades\Session;
//use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function product()
    {
        $about=about::first();
        $product=\App\product::first();
        return View('home.product',compact('product','about'));
    }

    public function laboratory()
    {
        $about=about::first();
        $laboratory=\App\laboratory::first();
        return View('home.laboratory',compact('laboratory','about'));
    }

    public  function  index()
    {
        /*if(!session::has('visitlog'))
        {
            $visitlog=session::get('visitlog');
            $v=VisitLog::save();
            $visitlog[$v->ip]=$v->ip;
            session::put('visitlog',$visitlog);
        }*/
        $about=about::first();
        $images=imagee::where('state','1')->get();
        $section=section::all();
        $certificates=iso::where('state','1')->OrderBy('id','desc')->take(3)->get();
        $catalogs=catalog::all()->take(9);
        $setting=\App\setting::first();
        /*if($setting->section1 != "0")
        return $setting->section1;*/
        return View('home.index',compact('about','images','section','certificates','catalogs','setting'));
    }

    public function contactSend(ContactFormRequest $request)
    {
        $send=new send($request->all());
        if($send->save())
        {
            alert()->success('پیام شما برای مدیر فرستاده شد', 'ارسال شد')->autoclose(4500);
            return redirect()->back();
        }
        else
        {
            alert()->error('خطایی رخ داده و ثبت انجام نشد!', 'خطا!')->autoclose(4500);
            return redirect('admin/images');
        }
    }

    public  function  iso()
    {
        $about=about::first();
        $certificates=iso::OrderBy('id','desc')->get();
        return View('home.iso-all',compact('about','certificates'));
    }

    public  function  gallery()
    {
        $about=about::first();
        $images=imagee::OrderBy('id','desc')->get();
        return View('home.gallery-all',compact('about','images'));
    }
}