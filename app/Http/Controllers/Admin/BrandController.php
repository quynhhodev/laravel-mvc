<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', ['brands' => $brands, 'title'=>'BRAND LIST']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.brand.create');
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
            'brandName'=> 'required|max:30|unique:hongocquynhbrands,brandName',
            'slug'=> 'required|unique:hongocquynhbrands,slug' 
        ]);
        //$dataInsert = $request->input();
        $dataInsert = request()->except(['_token']);
        Brand::insert($dataInsert);
        return redirect()->back()->with(['message' =>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', ['brand'=>$brand, 'title'=>'Thông tin']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        
        return view('admin.brand.edit', ['brand'=>$brand, 'title'=>'Chỉnh sửa']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'brandName'=>'required|max:100|unique:hongocquynhbrands,brandName',
            'slug'=>'required|unique:hongocquynhbrands,slug',
        ]);
        $brand->update($request->all());
        return redirect('/admin/brand')->with('message', 'Cập nhật thành công');
    }

    public function trash($id){
        Brand::where('id', $id)->delete();
        return redirect('/admin/brand')->with('message', 'Xóa thành công');
    }
    public function intrash(){
        $brands = Brand::onlyTrashed()->paginate(5);
        return view('admin.brand-intrash',['brands'=>$brands]);
    }

    public function restore($id){
        Brand::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/brand')->with('message', 'Khôi phục thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    
}
