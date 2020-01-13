<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderType;
use App\Product;
use App\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $orderTypes = OrderType::all();

        return view('admin.orders.create',compact('categories','orderTypes'));
    }


    public function update(Request $request,OrderType $orderType)
    {

    }

    public function index()
    {
      $orders = Order::paginate(5);

        return view('admin.orders.index',['orders'=>$orders]);
    }

    public function productCat(Request $request)
    {
        if(is_numeric($request->c_id)) {
            $products = Product::where('cat_id', $request->c_id)->get();
            $options = null;

            foreach ($products as $product) {
                $options .= "<option val='." . $product->id . "'" . ">" . $product->name . "</option>";
            }

            return response()->json($options);
        }else{
            $category = Category::where('name',$request->c_id)->first();
            $products = Product::where('cat_id',$category->id)->get();
            $options = null;

            foreach ($products as $product) {
                $options .= "<option val='." . $product->id . "'" . ">" . $product->name . "</option>";
            }

            return response()->json($options);
        }
    }

    public function listCat()
    {
        $categories = Category::all();
        $options = null;

        foreach ($categories as $category){
            $options .="<option val='".$category->id."'".">".$category->name ."</option>";
        }

        return response()->json($options);
    }

    public function submitOrder(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'total_price'=>'required|numeric',
            'orderType'=>'required|numeric',
            'name'=>'nullable',
            'lastname'=>'nullable',
            'phone'=>'nullable'
        ],[
            'total_price.required'=>'قیمت نهایی سفارش را وارد نمایید.',
        ]);

        $orders = Order::create([
            'total_price'=>$request->total_price,
            'order_type_id'=>$request->orderType,
            'name'=>$request->name,
            'last_name'=>$request->lastname,
            'phone_number'=>$request->phone
        ]);
        $products = array();
        $products['products']=$request->products;
        $products['count']=$request->count;
        $products['weight']=$request->weight;

        foreach ($products['products'] as $product){
            $productOrder =ProductOrder::create([
                'order_id'=> $orders->id,
                'product_id'=>Product::where('name',$product)->first()->id,
            ]);
            foreach ($products['count'] as $count){
                $productOrder->update([
                    'count'=>$count
                ]);
            }
            foreach ($products['weight'] as $weight){
                $productOrder->update([
                    'weight'=>$weight
                ]);
            }
        }

        return response()->json('success',200);

        //$orders->attach($request->products);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        //Session::flush('success','سفارش با حذف شد.');
        session()->flash('success','سفارش با حذف شد.');
        return back();

    }
}


