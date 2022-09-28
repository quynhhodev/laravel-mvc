<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::latest()->paginate(5);
        $categoriesLv1 = Category::where('parentId','=', 0)->get();
        return view('admin.category.index', ['categories' => $categories, 'title'=>'CATEGORY LIST', 'categoriesLv1'=>$categoriesLv1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriesLv1 = Category::where('parentId','=', 0)->get();
        return view('admin.category.create')->with('categoriesLv1', $categoriesLv1);
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
            'catName'=> 'required|max:30|unique:Categories,catName',
            'slug'=> 'required|unique:Categories,slug' 
        ]);
        $dataInsert = $request->input();
        Category::create($dataInsert);
        // $dataInsert = request()->except(['_token']);
        // Category::insert($dataInsert);
        return redirect()->back()->with(['message' =>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', ['category'=>$category, 'title'=>'Thông tin danh mục']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categoriesLv1 = Category::where('parentId','=', 0)->get();
        return view('admin.category.edit', ['category'=>$category, 'title'=>'Chỉnh sửa'])->with('categoriesLv1', $categoriesLv1);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'catName'=>'required|max:30|unique:categories,catName',
            'slug'=>'required|unique:categories,slug',
        ]);
        $category->update($request->all());
        return redirect('/admin/category')->with('message', 'Cập nhật thành công');
    }

    public function trash($id){
        Category::where('id', $id)->delete();
        return redirect('/admin/category')->with('message', 'Xóa thành công');
    }
    public function intrash(){
        $categories = Category::onlyTrashed()->paginate(5);
        return view('admin.category-intrash',['categories'=>$categories]);
    }

    public function restore($id){
        Category::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/category')->with('message', 'Khôi phục thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Category::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function changeStatus($id){
        $category = Category::find($id);
        if($category->status ==0)
            $category->status = 1;
        else
            $category->status = 0;

        $category->save();
        
        $categoriesLv1 = Category::where('parentId','=', 0)->get();
        return redirect ('admin/category')->with('message','Change Successfully');
    }
}
