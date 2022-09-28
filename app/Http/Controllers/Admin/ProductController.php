<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(5);
        foreach ($products as $product){
            $product->catName = Category::where('id','=', $product->catId)->first()->catName;
            $product->brandName = Brand::where('id', '=', $product->brandId)->first()->brandName;
        }
        return view('admin.product.index', ['products' => $products, 'title'=>'CATEGORY LIST']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesLv1 = Category::where('parentId','=',0)->get();
        $categoriesLv2 = Category::where('parentId','>',0)->get();
        $brands = Brand::all();
        return view('admin.product.create', ['categoriesLv1' => $categoriesLv1, 'categoriesLv2' => $categoriesLv2,'brands' => $brands]);
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
        $validated = $request->validate([
            'productName'=> 'required|max:100|unique:hongocquynhproducts,productName',
            'slug'=> 'required|unique:hongocquynhproducts,slug' 
        ]);
        //$dataInsert = $request->input();
        $dataInsert = request()->except(['_token']);
        Product::insert($dataInsert);
        return redirect()->back()->with(['message' =>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', ['product'=>$product, 'title'=>'Thông tin danh mục']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categoriesLv1 = Category::where('parentId','=',0)->get();
        $categoriesLv2 = Category::where('parentId','>',0)->get();
        $brands = Brand::all();
        return view('admin.product.edit', ['product'=>$product, 'title'=>'Chỉnh sửa', 'categoriesLv1' => $categoriesLv1, 'categoriesLv2' => $categoriesLv2,'brands' => $brands]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'productName'=> 'required|max:100|unique:hongocquynhproducts,productName',
            'slug'=> 'required|unique:hongocquynhproducts,slug' 
        ]);
        $product-> update($request->all());
        return redirect('/admin/product')->with('message', 'Cập nhật thành công');
    }

    public function trash($id){
        Product::where('id', $id)->delete();
        return redirect('/admin/product')->with('message', 'Xóa thành công');
    }
    public function intrash(){
        $products = Product::onlyTrashed()->paginate(5);
        return view('admin.product-intrash',['products'=>$products]);
    }

    public function restore($id){
        Product::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/product')->with('message', 'Khôi phục thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Product::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function changeStatus($id){
        $product = Product::find($id);
        if($product->status ==0)
            $product->status = 1;
        else
            $product->status = 0;

        $product->save();
        return redirect ('admin/product')->with('message','Change Successfully');
    }
}
