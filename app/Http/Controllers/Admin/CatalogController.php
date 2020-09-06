<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Catalog;
use App\Http\Requests\CatalogRequest;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs=catalog::all();
        return view('admin.catalog.index',compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogRequest $request)
    {
        $catalog=new catalog($request->all());
        /* image */
        $fileName=null;
        if ($request->hasFile('img'))
        {
            $file= $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName ='time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(105, 105)->save($destinationPath."/catalog_".$fileName);
            $path = public_path().'/images/';
            File::delete($path.$fileName);
            $catalog->img=$fileName;
        }
        /* image */
        /* file */
        if ($request->hasFile('file'))
        {
            $file= $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName ='catalog_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'catalog'.'/';
            $file->move($destinationPath, $fileName);
            $catalog->file=$fileName;
        }
        /* file */
        if($catalog->save())
        {
            alert()->success('ثبت با موفقیت انجام شد', 'ثبت شد!');
            return redirect('admin/catalog');
        }
        else
        {
            alert()->error('خطایی رخ داده و ثبت انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/catalog');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function catlogget()
    {
        $record=catalog::find(1);
        return View('admin.catalog.edit-special',compact('record'));
    }

    public  function catlogpost(Request $request)
    {
        $catalog=catalog::find(1);
        /* image */
        if ($request->hasFile('img'))
        {
            $file= $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName ='time_'.time().'_'.str_random(3).'.'.$extension;
            $destinationPath = 'images'.'/';
            $arg1=$file->move($destinationPath, $fileName);
            Image::make($arg1->getRealPath())->resize(960,600)->blur(30)->save($destinationPath."/catalog_main".$fileName);
            $path = public_path().'/images/';
            File::delete($path.$fileName);
            $catalog->img=$fileName;
        }
        $catalog->description=$request->description;
        /* image */
        if($catalog->update())
        {
            alert()->success('ویرایش با موفقیت انجام شد', 'ویرایش شد!');
            return redirect('admin/catalog');
        }
        else
        {
            alert()->error('خطایی رخ داده و ویرایش انجام نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/catalog');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=catalog::findorFail($id);
        $path = public_path() . '/images/catalog_' . $destroy->img;
        $path_file = public_path() . '/catalog/' . $destroy->file;
        File::delete($path,$path_file);
        $destroy->delete();
        alert()->error( 'حذف شد!')->autoclose(1500);
        return redirect()->back();
    }
}
