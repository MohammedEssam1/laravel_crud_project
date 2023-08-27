<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    function index()
    {
        $products = Product::get();

        return view('products', ['products' => $products]);
    }



    function show($id)
    {
        $product = Product::find($id);

        return view('showproduct', compact('product'));
    }



    function destory($id)
    {

        $product = Product::find($id);
        $imagePath = public_path('images/' . $product->product_picture);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();
        return redirect()->route('product.index');
    }




    function update($id)
    {
        $product = Product::find($id);
        return view('update',compact('product') );
    }


    

    function edit($id,Request $request)
    {
        $product = Product::find($id);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $imagePath = public_path('images/'.$product->product_picture);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->update([
            'product_name' => $request['product_name'],
            'product_picture' => $imageName,
            'product_availability' => $request['product_availability'],
            'product_price' => $request['product_price'],
            'category_id' => $request['category_id'],
            'admin_id' => $request['admin_id'],
        ]);
        return redirect()->route('product.index');
    }





    function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'product_name'=>$request['product_name'],
            'product_picture'=> $imageName,
            'product_availability'=>$request['product_availability'],
            'product_price'=>$request['product_price'],
            'category_id'=>$request['category_id'],
            'admin_id'=>$request['admin_id'],
        ]);
        return redirect()->route('product.index');
    }
}
