<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\iso;
use App\Http\Requests\ImageRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class IsoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function chooseiso(Request $request)
    {
        $iso=iso::findorFail($request->id);
        $state=$iso->state;
        $state=intval($state);
        $state=$state/-1;
        $iso->state=$state;
        $iso->update();
        return $state;
    }

    public function index()
    {
        $images=iso::OrderBy('id','desc')->paginate(9);
        return view('admin.iso.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.iso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        $iso=new iso($request->all());
        $fileName=null;
        if ($request->hasFile('img'))
        {
            $file= $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName ='iso_'.'time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(293, 293)->save($destinationPath."/small_".$fileName);
            $iso->img=$fileName;
        }
        if($iso->save())
        {
            alert()->success('ثبت با موفقیت انجام شد', 'ثبت شد!');
            return redirect('admin/iso');
        }
        else
        {
            alert()->error('خطایی رخ داده و ثبت انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/iso');
        }
    }

    /**
     * Display the specified resource.
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
        $record=iso::find($id);
        return View('admin.iso.edit',['record'=>$record]);
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
        $iso=iso::find($id);
        $fileName=null;
        if ($request->hasFile('img'))
        {
            $file= $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName ='iso_'.'time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(293, 293)->save($destinationPath."/small_".$fileName);
            $path = public_path().'/images/'.$iso->img;
            $path_small = public_path().'/images/small_'.$iso->img;
            File::delete($path,$path_small);
            $iso->img=$fileName;
        }
        $iso->name=$request->name;
        $iso->description=$request->description;
        $iso->tags=$request->tags;
        if($iso->update())
        {
            alert()->success('ویرایش با موفقیت انجام شد', 'ویرایش شد!');
            return redirect('admin/iso');
        }
        else
        {
            alert()->error('خطایی رخ داده و ویرایش انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/iso');
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
        $destroy=iso::findorFail($id);
        $path = public_path() . '/images/' . $destroy->img;
        $pathsmall = public_path() . '/images/small_' . $destroy->img;
        File::delete($path,$pathsmall);
        $destroy->delete();
        alert()->error( 'حذف شد!')->autoclose(1500);
        return redirect()->back();
    }
}
