<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\section;
use App\laboratory;
use App\product;
use App\about;
use App\setting;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=section::all();
        $laboratory=laboratory::first();
        $product=product::first();
        $map=about::first();
        $setting=setting::first();
        return View('admin.sections.index',compact('sections','laboratory','product','map','setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /*$section=section::find($id);
       return View('admin.sections.show');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section=section::find($id);
        return View('admin.sections.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section=section::find($id);
        /* Setting */
        $setting=setting::first();
        if($id=="1")
        {
            $setting->section1=$request->name;
            $setting->update();
        }
        else
        {
            $setting->section2=$request->name;
            $setting->update();
        }
        /* Setting */
        $name_main=$section->img;
        if ($request->hasFile('img'))
        {
            /* save - image */
            $path = public_path().'/images/';
            $name_main=null;
            $files= $request->file('img');
            foreach ($files as $file)
            {
                $extension = $file->getClientOriginalExtension();
                $fileName = 'section_' . $section->id . 'time_' . time() . '_' . str_random(3) . '.' . $extension;
                $destinationPath = 'images' . '/';
                $arg1 = $file->move($destinationPath, $fileName);
                if ($section->id == 1)
                {
                    Image::make($arg1->getRealPath())->resize(800, 400)->save($destinationPath . "/section_" . $fileName);
                }
                else
                {
                    Image::make($arg1->getRealPath())->resize(600, 600)->save($destinationPath . "/section_" . $fileName);
                }
                File::delete($path.$fileName);
                $name_main=$name_main.$fileName."#";
            }
            $length=strlen($name_main);
            $name_main=str_limit($name_main,$length-1,$end = '');
           /* $value = str_limit('The PHP framework for web artisans.', 7);*/
            /* save - image */
            /* delete - image */
            $d_images=explode("#", $section->img);
            foreach ($d_images as $image)
            {
                File::delete($path."section_".$image);
            }
            /* delete - image */
        }
        if($section->update(['name'=>$request->name,
            'description'=>$request->description,'list'=>$request->list,'img'=>$name_main]))
        {
            alert()->success(',ویرایش با موفقیت انجام شد', 'ویرایش شد!');
            return redirect('admin/section');
        }
        else
        {
            alert()->error('خطایی رخ داده و ویرایش انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/section');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
