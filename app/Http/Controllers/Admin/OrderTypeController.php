<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderTypeController extends Controller
{
    public function index()
    {
        $orderTypes = OrderType::paginate(5);
        return view('admin.orderTypes.index',compact('orderTypes'));
    }

    public function create()
    {
        return view('admin.orderTypes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required'
        ],[
            'title.required'=>'عنوان را وارد کنید.'
        ]);

       /* $orderType = OrderType::create([
            'title'=>$request->title
        ]);*/
        $orderType = OrderType::create($request->all());
        return back();
    }

    public function update(Request $request,OrderType $orderType)
    {
        $this->validate($request,[
            'title'=>'required'
        ],[
            'title.required'=>'عنوان را وارد کنید.'
        ]);

        /* $orderType = OrderType::create([
             'title'=>$request->title
         ]);*/
        $orderType = $orderType->update($request->all());
        return back();
    }

    public function edit(OrderType $orderType)
    {
        return view('admin.orderTypes.edit',compact('orderType'));
    }

    public function destroy(OrderType $orderType)
    {
        $orderType->delete();
        return back();
    }
}
