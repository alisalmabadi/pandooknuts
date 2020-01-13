<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wiki;
use App\Category;

class WikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Wiki::orderBy('id','DESC')->paginate(6);
        return view('admin.wiki.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.wiki.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categories' => 'required',
            'intro' => 'required',
            'advantage' => 'required',
            'types' => 'required',
            'qa' => 'required',
            'brief' => 'required',
            'mainImage' => 'required',
        ]);

        $wiki=new Wiki();
        $wiki->cat_id=str_replace('cat','',$request->categories);
        $wiki->intro=$request->intro;
        $wiki->advantage=$request->advantage;
        $wiki->types=$request->types;
        $wiki->qa=$request->qa;
        $wiki->brief=$request->brief;
        $wiki->image=$request->mainImage;
        if (isset($request->featured)){
            $wiki->featured=1;
        }
        else{
            $wiki->featured=0;
        }
        $wiki->save();
        $pm='مطلب شما با موفقیت ذخیره شد';

        $categories=Category::all();
        return view('admin.wiki.create',compact('categories','pm'));


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
        $wiki=Wiki::find($id);
        $categories=Category::all();

        return view('admin.wiki.edit',compact('wiki','categories'));
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
        $validatedData = $request->validate([
            'categories' => 'required',
            'intro' => 'required',
            'advantage' => 'required',
            'types' => 'required',
            'qa' => 'required',
            'brief' => 'required',
            'mainImage' => 'required',
        ]);

        $wiki=Wiki::find($id);
        $wiki->cat_id=str_replace('cat','',$request->categories);
        $wiki->intro=$request->intro;
        $wiki->advantage=$request->advantage;
        $wiki->types=$request->types;
        $wiki->qa=$request->qa;
        $wiki->brief=$request->brief;
        $wiki->image=$request->mainImage;
        if (isset($request->featured)){
            $wiki->featured=1;
        }
        else{
            $wiki->featured=0;
        }
        $wiki->save();
        $pm='مطلب شما با موفقیت ویرایش شد';

        $categories=Category::all();
        return view('admin.wiki.edit',compact('categories','pm','wiki'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wiki::find($id)->delete();
        return redirect('/pandook-admin/wiki');
    }
}
