<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\about;
use function Sodium\compare;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\setting;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=about::first();
        return View('admin.about.index',['about'=>$about]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record=about::first();
        return view('admin.about.edit-about',compact('record'));
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
        $about=about::find($id);
        /* header sliders */
        $name_main=$about->header;
        if ($request->hasFile('header'))
        {
            /* save - image */
            $path = public_path().'/images/';
            $name_main=null;
            $files= $request->file('header');
            /* save images*/
            foreach ($files as $file)
            {
                $extension = $file->getClientOriginalExtension();
                $fileName =$about->id . 'time_' . time() . '_' . str_random(3) . '.' . $extension;
                $destinationPath = 'images' . '/';
                $arg1 = $file->move($destinationPath, $fileName);
                /* resize */
                Image::make($arg1->getRealPath())->resize(1600,800)->save($destinationPath . "/header_" . $fileName);
                /* resize */
                File::delete($path.$fileName);
                $name_main=$name_main.$fileName."#";
            }
            /* save images*/
            $length=strlen($name_main);
            $name_main=str_limit($name_main,$length-1,$end = '');
            /* save - image */
            /* delete - images */
            $d_images=explode("#", $about->header);
            foreach ($d_images as $image)
            {
                File::delete($path."header_".$image);
            }
            /* delete - images */
        }
        /*header sliders*/
        /* image logo */
        $logo=$about->logo;
        if ($request->hasFile('logo'))
        {
            $file= $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName ='logo_'.'time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(60, 70)->save($destinationPath."/footer_".$fileName);
            Image::make($arg1->getRealPath())->resize(130, 133)->save($destinationPath."/header_".$fileName);
            Image::make($arg1->getRealPath())->resize(55, 57)->save($destinationPath."/small_".$fileName);
            //$path = public_path().'/images/'.$about->logo;
            $path_footer = public_path().'/images/footer_'.$about->logo;
            $path_header = public_path().'/images/header_'.$about->logo;
            $path_small = public_path().'/images/small_'.$about->logo;
            $path_main = public_path().'/images/'.$fileName;
            File::delete($path_footer,$path_small,$path_header,$path_main);
            $logo=$fileName;
        }
        /* image logo*/
        /* image map */
        $map_img=$about->map_img;
        if ($request->hasFile('map_img'))
        {
            $file= $request->file('map_img');
            $extension = $file->getClientOriginalExtension();
            $fileName ='map_'.'time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(1400,400)->save($destinationPath."/".$fileName);
            $path_old = public_path().'/images/'.$about->map_img;
            //$path_main = public_path().'/images/'.$fileName;
            File::delete($path_old);
            $map_img=$fileName;
        }
        /* image map */
        /* update */
        if($about->update(['twitter'=>$request->twitter,'telegram'=>$request->telegram,'facebook'=>$request->facebook,
            'address'=>$request->address,'email'=>$request->email,'name'=>$request->name,'mobile'=>$request->mobile,
            'phone'=>$request->phone,'instagram'=>$request->instagram,'url'=>$request->url,'fax'=>$request->fax,
            'tags'=>$request->tags,'about'=>$request->about,'logo'=>$logo,'manage'=>$request->manage,
            'header'=>$name_main,'map_link'=>$request->map_link,'map_img'=>$map_img,'title'=>$request->title]))
        {
            alert()->success('ویرایش با موفقیت انجام شد', 'ویرایش شد!');
            return redirect('admin/about');
        }
        else
        {
            alert()->error('خطایی رخ داده و ویرایش انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/about');
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
