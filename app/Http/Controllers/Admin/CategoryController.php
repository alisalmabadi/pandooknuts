<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->get();
        return view('admin.categories.index',compact('categories'));
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
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'mainImage'=>'required'
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->image=$request->mainImage;

        if (isset($request->featured)){
            $category->featured=1;
        }
        else{
            $category->featured=0;
        }
        $category->save();

        $pm='دسته بندی شما با موفقیت ذخیره شد';

        $categories=Category::orderBy('id','DESC')->get();
        return view('admin.categories.index',compact('categories','pm'));
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
        $categories=Category::orderBy('id','DESC')->get();
        $mcategory=Category::find($id);
        return view('admin.categories.edit',compact('categories','mcategory'));


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
            'name' => 'required|unique:categories',
            'mainImage'=>'required'
        ]);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->image=$request->mainImage;

        if (isset($request->featured)){
            $category->featured=1;
        }
        else{
            $category->featured=0;
        }
        $category->save();

        $pm='دسته بندی شما با موفقیت ویرایش شد';
        $mcategory=Category::find($id);

        $categories=Category::orderBy('id','DESC')->get();
        return view('admin.categories.edit',compact('categories','pm','mcategory'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect('/pandook-admin/categories');


    }
}
