<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Requests\cateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Products;
use App\categories;
use App\paracatedetail;
use App\parameter_detail;



class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arCate = categories::all();
        $categories = categories::orderby('id','DESC')->paginate(10);
        return view('admin.category.index', ['arcate'=>$arCate, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cateRequest $request)
    {
        $name    = $request->name;
        $parent  = $request->parent;

        $name_olds = categories::select('name')->where('name','=',$name)->get();
        $name_old ="";
        foreach ($name_olds as $key => $value) {
            $name_old = $value->name;
        }

        if ($name_old != '') {
            $request->session()->flash('msg-e','Thêm thất bại, tên danh mục đã tồn tại');
            return redirect()->route('admin.category');
        }else{
            $arCate = array(
                'name' =>$name,
                'parent' => $parent
            );
        }
        if (categories::insert($arCate)) {
            $request->session()->flash('msg-s','Thêm thành công');
            return redirect()->route('admin.category');
        }else{
            $request->session()->flash('msg-e','Thêm thất bại');
            return redirect()->route('admin.category');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$id)
    {
        $arcate = categories::find($id);
        $category = categories::all();
        // dd($arcate);
        return view('admin.category.edit', ['arcate'=>$arcate,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug,$id)
    {
        $idcat = $request->id;
        $arcate = categories::find($id);
        if ($idcat == $id) {
            $arcate->name   = $request->name;
            $arcate->parent   = $request->parent;
            $arcate->update();
            $request->session()->flash('msg-s', 'Update thành công');
            return redirect()->route('admin.category');
        }else{
            $request->session()->flash('msg-e','Update thất bại');
            return redirect()->route('admin.category');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,$id)
    {
        
        $arcate = categories::find($id);
        if ($id == $arcate->id) {
            // dd($para);
            if (count(paracatedetail::where('categories_id','=',$id)->get()) > 0 ) {
                paracatedetail::where('categories_id','=',$id)->delete();
            }

            if (count(Products::where('category_id','=',$id)->get()) > 0) {
                $ids = Products::where('category_id','=',$id)->select('id')->get();
                if (count(parameter_detail::where('product_id','=',$ids[0]->id)->get()) > 0 ) {
                    parameter_detail::where('product_id','=',$ids[0]->id)->delete();
                }
                Products::where('category_id','=',$id)->delete();
            }
            
            $arcate->delete();
            $request->session()->flash('msg-s', 'Delete thành công');
            return redirect()->route('admin.category');
        }else{
            $request->session()->flash('msg-e','Delete thất bại');
            return redirect()->route('admin.category');
        }
        
    }
}
