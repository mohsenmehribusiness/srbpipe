<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{

    public  function settingg(Request $request)
    {
        $input=$request->id;
        $setting=\App\setting::first();
        switch ($input)
        {
            case 'section1':
            {
                if($setting->section1 =="0")
                {
                    $section=\App\section::find(1);
                    $setting->section1=$section->name;
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->section1="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
            case 'section2':
            {
                if($setting->section2 =="0")
                {
                    $section=\App\section::find(2);
                    $setting->section2=$section->name;
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->section2="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
            case 'laboratory':
            {
                if($setting->laboratory =="0")
                {
                    $laboratory=\App\laboratory::first();
                    $setting->laboratory=$laboratory->name;
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->laboratory="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
            case 'product':
            {
                if($setting->product =="0")
                {
                    $product=\App\product::first();
                    $setting->product=$product->name;
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->product="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
            case 'map':
            {
                if($setting->map =="0")
                {
                    $setting->map="1";
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->map="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
            case 'iso':
            {
                if($setting->iso =="0")
                {
                    $setting->iso="1";
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->iso="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
            case 'image':
            {
                if($setting->image =="0")
                {
                    $setting->image="1";
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->image="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
            case 'catalog':
            {
                if($setting->catalog =="0")
                {
                    $setting->catalog="1";
                    $setting->update();
                    return "1";
                }
                else
                {
                    $setting->catalog="0";
                    $setting->update();
                    return "0";
                }
                break;
            }
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image_count=\App\imagee::count();
        $iso_count=\App\iso::count();
        $send_count=\App\send::count();
        $catalog_count=\App\catalog::count();
        $catalog_count--;
        $count=0;
        return View('admin.index',compact('image_count','iso_count','send_count','count','catalog_count'));
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
        //
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
        //
    }
}
