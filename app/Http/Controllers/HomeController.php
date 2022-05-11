<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Product = Product::orderBy('id','DESc')->paginate(15);
        $Blog = Blog::orderBy('id','DESc')->paginate(15);
        return view('welcome', compact('Product', 'Blog'));
    }
    public function shop()
    {
        $Product = Product::orderBy('id','DESc')->paginate(15);
        $Blog = Blog::orderBy('id','DESc')->paginate(15);
        return view('shop', compact('Product', 'Blog'));
    }
    public function shop_details($id){
        $category_product = Category::where('id',$id)->first(); 
        $Product = Product::orderBy('id','DESc')->paginate(15);
        $Product_details = Product::where('id',$id)->first();
        $Blog = Blog::orderBy('id','DESc')->paginate(15);
        
        return view('shop-details',['Product'=>$Product, 'Product_details'=>$Product_details,'Blog'=>$Blog, 'category_product'=>$category_product]);
    }
    public function shop_category($id){
        $category_product = Category::where('id',$id)->first(); 
        $Product = Product::orderBy('id','DESc')->paginate(15);
        $Product_details = Product::where('id',$id)->first(); 
        $Blog = Blog::orderBy('id','DESc')->paginate(15);
        //dd($category_product);
        // return view('shop-category', compact('Product', 'Blog'));
        return view('shop-category', ['Product'=>$Product, 'Product_details'=>$Product_details,'Blog'=>$Blog, 'category_product'=>$category_product]);
    } 
    public function shop_cart(){
        return view('shop-cart');
    }
    public function contact(){
        return view('contact');
    }
    public function check_out(){
        return view('check-out');
    }
    public function blog_details($id){
        $Blog_detail = Blog::where('id',$id)->first(); 
        $Blog = Blog::orderBy('id','DESc')->paginate(15);
        return view('blog-details', compact('Blog_detail', 'Blog'));
    }
    public function blog(){
        $Blog = Blog::orderBy('id','DESc')->paginate(15);
        return view('blog', compact('Blog'));
    }
}
