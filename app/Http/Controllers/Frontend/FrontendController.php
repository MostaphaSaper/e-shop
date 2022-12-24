<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::where('popular','1')->take(15)->get();
        $product = Product::where('trending','1')->take(15)->get();
        return view('frontend.index',compact('product','category'));
    }

    public function category()
    {
        $category = Category::where('status','1')->get();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->get();
            return view('frontend.products.viewproducts',compact('category','products'));
        }
    }
    public function viewproduct($cate_name,$prod_name)
    {
            if(Category::where('name',$cate_name)->exists()){
                if(Product::where('name',$prod_name)->exists()){
                    $product = Product::where('name',$prod_name)->first();
                    return view('frontend.products.view',compact('product'));
                }
            }
    }
}
