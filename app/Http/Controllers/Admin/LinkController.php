<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $links = Link::latest()->paginate(5);
        return view('admin.link.index', ['links' => $links, 'title'=>'CATEGORY LIST']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.create');
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
            'title'=> 'required|max:100|unique:hongocquynhlinks,title'
        ]);
        //$dataInsert = $request->input();
        $dataInsert = request()->except(['_token']);
        Link::insert($dataInsert);
        return redirect()->back()->with(['message' =>'Thêm thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        return view('admin.link.show', ['link'=>$link, 'title'=>'Thông tin danh mục']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('admin.link.edit', ['link'=>$link, 'title'=>'Chỉnh sửa']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $validated = $request->validate([
            'title'=> 'required|max:100|unique:hongocquynhlinks,title'
        ]);
        $link-> update($request->all());
        return redirect('/admin/link')->with('message', 'Cập nhật thành công');
    }

    public function trash($id){
        Link::where('id', $id)->delete();
        return redirect('/admin/link')->with('message', 'Xóa thành công');
    }
    public function intrash(){
        $links = Link::onlyTrashed()->paginate(5);
        return view('admin.link-intrash',['links'=>$links]);
    }

    public function restore($id){
        Link::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/link')->with('message', 'Khôi phục thành công');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Link::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }

    public function changeStatus($id){
        $link = Link::find($id);
        if($link->status ==0)
            $link->status = 1;
        else
            $link->status = 0;

        $link->save();
        return redirect ('admin/link')->with('message','Change Successfully');
    }
}
