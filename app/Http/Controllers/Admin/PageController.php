<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Page::latest()->paginate(5);
        return view('admin.pagecontrol.index', ['pages' => $pages, 'title'=>'PAGE LIST']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pagecontrol.create');
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
            'title'=> 'required|max:100|unique:hongocquynhpages,title',
            'slug'=> 'required|unique:hongocquynhpages,slug' 
        ]);
        //$dataInsert = $request->input();
        $dataInsert = request()->except(['_token']);
        Page::insert($dataInsert);
        return redirect()->back()->with(['message' =>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.page.show', ['page'=>$page, 'title'=>'Thông tin danh mục']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pagecontrol.edit', ['page'=>$page, 'title'=>'Chỉnh sửa']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title'=> 'required|max:100|unique:hongocquynhpages,title',
            'slug'=> 'required|unique:hongocquynhpages,slug' 
        ]);
        $page-> update($request->all());
        return redirect('/admin/page')->with('message', 'Cập nhật thành công');
    }

    public function trash($id){
        Page::where('id', $id)->delete();
        return redirect('/admin/page')->with('message', 'Xóa thành công');
    }
    public function intrash(){
        $pages = Page::onlyTrashed()->paginate(5);
        return view('admin.page-intrash',['pages'=>$pages]);
    }

    public function restore($id){
        Page::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/page')->with('message', 'Khôi phục thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Page::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function changeStatus($id){
        $page = Page::find($id);
        if($page->status ==0)
            $page->status = 1;
        else
            $page->status = 0;

        $page->save();
        return redirect ('admin/page')->with('message','Change Successfully');
    }

   

    
}
