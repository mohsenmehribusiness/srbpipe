<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\laboratory;
use App\Http\Requests\LaboratoryRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Setting;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratory=laboratory::first();
        return View('admin.laboratory.index',compact('laboratory'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record=laboratory::first();
        return View('admin.laboratory.edit-laboratory',compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoryRequest $request, $id)
    {
        $laboratory=laboratory::first();
        /* Setting */
        $setting=setting::first();
        $setting->laboratory=$request->name;
        $setting->update();
        /* Setting */
        $laboratory->description=$request->description;
        $laboratory->name=$request->name;
        /** save images*/
        if ($request->hasFile('img'))
        {
            /* save - image */
            $path = public_path().'/images/';
            $name_main=null;
            $files= $request->file('img');
            foreach ($files as $file)
            {
                $extension = $file->getClientOriginalExtension();
                $fileName =time() . '_' . str_random(3) . '.' . $extension;
                $destinationPath = 'images' . '/';
                $arg1 = $file->move($destinationPath, $fileName);
                Image::make($arg1->getRealPath())->resize(800, 400)->save($destinationPath . "/laboratory_" . $fileName);
                File::delete($path.$fileName);
                $name_main=$name_main.$fileName."#";
            }
            $length=strlen($name_main);
            $name_main=str_limit($name_main,$length-1,$end = '');
            /* delete - image */
            $d_images=explode("#", $laboratory->img);
            foreach ($d_images as $image)
            {
                File::delete($path."laboratory_".$image);
            }
            /* delete - image */
            $laboratory->img=$name_main;
        }
        /** save images*/
        if($laboratory->update())
        {
            alert()->success(',ویرایش با موفقیت انجام شد', 'ویرایش شد!');
            return redirect('admin/laboratory');
        }
        else
        {
            alert()->error('خطایی رخ داده و ویرایش انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/laboratory');
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
