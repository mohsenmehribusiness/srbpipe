<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\send;
use App\response;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sends=send::where('state','0')->OrderBy('id','desc')->paginate(4);
        $asl="state0";
        return view('admin.send.index',compact('sends','asl'));
    }

    public function all()
    {
        $sends=send::orderby('id','desc')->paginate(6);
        $asl="state";
        return view('admin.send.index',compact('sends','asl'));
    }

    public function state()
    {
        $sends=send::where('state','1')->paginate(4);
        $asl="state1";
        return view('admin.send.index',compact('sends','asl'));
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
        $send=send::find($id);
        return View('admin.send.response',compact('send'));
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
        $response=new response($request->all());
        if($response->save())
        {
            alert()->success('پاسخ شما ثبت و نمایش داده خواهد شد', 'ثبت شد!');
            return redirect('admin/send');
        }
        else
        {
            alert()->error('خطایی رخ داده و پاسخ ثبت نشد!', 'خطا!')->autoclose(3500);
            return redirect('admin/send');
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
        $destroy=send::findorFail($id);
        $destroy->delete();
        alert()->error( 'حذف شد!')->autoclose(1500);
        return redirect()->back();
    }
}
