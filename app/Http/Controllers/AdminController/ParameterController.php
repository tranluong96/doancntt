<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\parameters;
use App\categories;
use App\paracatedetail;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arPara = DB::table('parameters')->orderby('id','DESC')->get();
        $arcategories = DB::table('categories')->orderby('id','DESC')->get();
        return view('admin.parameters.index',['parameters'=> $arPara, 'categories'=>$arcategories]);
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


    function getParameters(Request $request){
        $ar = parameters::all();
        $str = "";
        foreach ($ar as $key => $value) {
            $slug = str_slug($value->name);
            $str .= '<tr>
                <td>'.$key.'</td>';
            $str .= '<td><input type="text" name="" value="'.$value->name.'" disabled class="form-control"></td>';
            $str .= '<td>
                    <a href="'.route('admin.edit.parameter',['slug'=>$slug,'id'=>$value->id]).'" id="edit-'.$value->id.'" class="text-success"><i class="fa fa-refresh"> Edit</i></a>
                </td>';
            $str .= '<td>
                    <a href="javascript:void(0)" onclick="destroy('.$value->id.')" class="text-red"><i class="fa fa-trash-o"> Delete</i></a>
                </td>
            </tr>';
        }
        return $str;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = trim($request->name);
        $cate = $request->para;

        if ($name == null) {
            return "Nhập rỗng !";
        }else{
            $arpara = array('name' =>$name);
            if (parameters::insert($arpara)) {

                $arpa = parameters::where('name','=',$name)->get();
                $id_para = $arpa[0]->id;
                $ar = array(
                    'parameters_id' => $id_para,
                    'categories_id' => $cate
                );
                paracatedetail::insert($ar);
                return '<p class="alert alert-success alert-dismissable">Thêm thành công !</p>';
            }else{
                return 'Thêm thất bại !';
            }
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
        $arPara = parameters::find($id);
        return view('admin.parameters.edit',['parameters'=> $arPara]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $obj  = parameters::find($id);
        $name = trim($request->name) ;
        if ($name == null) {
            $request->session()->flash('msg-e','Thêm thất bại, tên danh mục đã tồn tại');
            return redirect()->route('admin.edit.parameter',['slug'=>str_slug($obj->name), 'id'=>$id]);
        }
        $obj->name = $name;
        $obj->update();
        $request->session()->flash('msg-s','Sửa thành công !');
        return redirect()->route('admin.parameter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id  = $request->aid;
        $obj = parameters::find($id);
        $des = DB::table('paracatedetail')->where('parameters_id','=',$id)->delete();
        $obj->delete();
        return '<p class="alert alert-danger alert-dismissable">Xóa thành công !</p>';
    }
}
