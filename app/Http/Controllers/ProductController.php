<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id','asc')->search()->paginate(15); // lỗi search , create_at lỗi thay id vào
        //dd($data);
        return view('admin.product.index', compact('data')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sale = Sale::orderBy('name','ASC')->select('id','name')->get();
        $category = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.create',compact('category', 'sale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads'), $file_name);
            $request->merge(['images' => $file_name]);                  
        }
        if(Product::create($request->all())){
            return redirect()->route('product.index')->with('success','thêm mới thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $sale = Sale::orderBy('name','ASC')->select('id','name')->get();
        $category = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.product.edit', compact('product', 'sale', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('uploads'), $file_name);
            $request->merge(['images' => $file_name]);      
            //dd($request->all());            
        }
        if($product->update($request->all())){            
            return redirect()->route('product.index')->with('success','sửa thành công');
        }else
        {
            return redirect()->route('product.index')->with('error','sửa không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
            return redirect()->route('product.index')->with('success','xóa thành công');
    }
}
