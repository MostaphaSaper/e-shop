<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.products.add',compact('category'));
    }

    public function insert(Request $request)
    {
        $prod = new Product();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $prod->image = $filename;
        }
        $prod->cate_id = $request->input('cate_id');
        $prod->name = $request->input('name');
        $prod->slug = $request->input('slug');
        $prod->small_description = $request->input('small_description');
        $prod->description = $request->input('description');
        $prod->original_price = $request->input('Original_Price');
        $prod->selling_price = $request->input('Selling_Price');
        $prod->tax = $request->input('tax');
        $prod->qty = $request->input('qty');
        $prod->status = $request->input('status') == TRUE ? '1' : '0';
        $prod->trending = $request->input('trending') == TRUE ? '1' : '0';
        $prod->meta_title = $request->input('meta_title');
        $prod->meta_keyword = $request->input('meta_keyword');
        $prod->meta_description = $request->input('meta_description');
        $prod->save();
        return redirect('/products')->with('status','Product Added Succesfully');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit',compact('product'));
    }
    public function update(Request $request,$id){
        $prod = Product::find($id);
        if($request->hasFile('image')){
            $path = 'assets/uploads/products/'.$prod->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $prod->image = $filename;
        }
        $prod->name = $request->input('name');
        $prod->slug = $request->input('slug');
        $prod->small_description = $request->input('small_description');
        $prod->description = $request->input('description');
        $prod->original_price = $request->input('Original_Price');
        $prod->selling_price = $request->input('Selling_Price');
        $prod->tax = $request->input('tax');
        $prod->qty = $request->input('qty');
        $prod->status = $request->input('status') == TRUE ? '1' : '0';
        $prod->trending = $request->input('trending') == TRUE ? '1' : '0';
        $prod->meta_title = $request->input('meta_title');
        $prod->meta_keyword = $request->input('meta_keyword');
        $prod->meta_description = $request->input('meta_description');
        $prod->update();
        return redirect('/products')->with('status','Product Updated Succesfully');
    }

    public function destroy($id){
        $prod = Product::find($id);
        if($prod->image){
            $path = 'assets/uploads/products/'.$prod->image;
            if(File::exists($path)){
                File::delete($path);
            }

        }
        $prod->delete();
        return redirect('products')->with('status',"Product Deleted Successfully");
    }
    
}
