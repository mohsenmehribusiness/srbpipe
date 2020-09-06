<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\imagee;

class ImageController extends Controller
{
    /*
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public  function chooseimage(Request $request)
    {
        $images=imagee::findorFail($request->id);
        $state=$images->state;
        $state=intval($state);
        $state=$state/-1;
        $images->state=$state;
        $images->update();
        return $state;
    }


    public function index()
    {
        $images=imagee::OrderBy('id','desc')->paginate(9);
        return view('admin.images.index',compact('images'));
    }

    /*
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ImageRequest $request)
    {
        $imagii=new imagee($request->all());
        $fileName=null;
        if ($request->hasFile('img'))
        {
            $file= $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName ='pipe_'.'time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(360, 270)->save($destinationPath."/small_".$fileName);
            $imagii->img=$fileName;
        }
        if($imagii->save())
        {
            alert()->success('ثبت با موفقیت انجام شد', 'ثبت شد!');
            return redirect('admin/images');
        }
        else
        {
            alert()->error('خطایی رخ داده و ثبت انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/images');
        }
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
        $record=imagee::find($id);
        return View('admin.images.edit',['record'=>$record]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imagii=imagee::find($id);
        $fileName=$imagii->img;
        if ($request->hasFile('img'))
        {
            $file= $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName ='pipe_'.'time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(360, 270)->save($destinationPath."/small_".$fileName);
            $path = public_path().'/images/'.$imagii->img;
            $path_small = public_path().'/images/small_'.$imagii->img;
            File::delete($path,$path_small);
            $imagii->img=$fileName;
        }
        if($imagii->update(['name'=>$request->name,'description'=>$request->description,'tags'=>$request->tags,'img'=>$fileName]))
        {
            alert()->success(',ویرایش با موفقیت انجام شد', 'ویرایش شد!');
            return redirect('admin/images');
        }
        else
        {
            alert()->error('خطایی رخ داده و ویرایش انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/images');
        }
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=imagee::findorFail($id);
        $path = public_path() . '/images/' . $destroy->img;
        $pathsmall = public_path() . '/images/small_' . $destroy->img;
        File::delete($path,$pathsmall);
        $destroy->delete();
        alert()->error( 'حذف شد!')->autoclose(1500);
        return redirect()->back();
    }
}