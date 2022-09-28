<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deal;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$deal = Deal::orderBy('id')->first();
        $deals  = Deal::latest()->paginate(5);
        return view('admin.deal.index', ['deals' => $deals, 'title'=>'DEAL LIST']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=> 'required|max:30|unique:Deal,title',
            'slug'=> 'required|unique:Deal,slug' 
        ]);
        $dataInsert = $request->input();
        Deal::create($dataInsert);
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
    public function show($deal)
    {
        return view('admin.deal.show', ['deal'=>$deal, 'title'=>'Thông tin danh mục']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($deal)
    {
        return view('admin.deal.edit', ['deal'=>$deal, 'title'=>'Chỉnh sửa']);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        $validated = $request->validate([
            'title'=>'required|max:30|unique:deal,title',
            'slug'=>'required|unique:deal,slug',
        ]);
        $deal->update($request->all());
        return redirect('/admin/deal')->with('message', 'Cập nhật thành công');
    }

    public function trash($id){
        Deal::where('id', $id)->delete();
        return redirect('/admin/deal')->with('message', 'Xóa thành công');
    }
    public function intrash(){
        $deals = Deal::onlyTrashed()->paginate(5);
        return view('admin.deal-intrash',['deals'=>$deals]);
    }

    public function restore($id){
        Deal::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/deal')->with('message', 'Khôi phục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deal::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
    public function changeStatus($id){
        $deal = Deal::find($id);
        if($deal->status ==0)
            $deal->status = 1;
        else
            $deal->status = 0;

        $deal->save();
        
        
        return redirect ('admin/deal')->with('message','Change Successfully');
    }
}
