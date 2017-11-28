<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Product;
use App\Category;
use App\Comment;
use App\Parameter;
use App\Paracatedetail;
use App\Parameter_detail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->forget('IDCate');
        // dd(Session::get('parameters'));
        $arProducts = Product::orderby('id','DESC')->paginate(10);
        return view('admin.product.list_product', ['arProduct' => $arProducts]);
    }

    public function changerActive(Request $request)
    {
        $id = $request->aid;
        $gt= $request->aso;
        // dd($id);
        if($id>0){
            if ($gt==0) {

                Product::where('id','=',$id)->update(['active' => 1]);

                echo '<i class="fa fa-power-off text-green" onclick="changerActive('.$id.',1)" aria-hidden="true"></i>';
            }
            if ($gt==1) {

                Produc::where('id','=',$id)->update(['active' => 0]);

                echo '<i class="fa fa-power-off text-red" onclick="changerActive('.$id.',0)" aria-hidden="true"></i>';
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arCate = Category::all();
        // dd($arCate);
         return view('admin.product.CateAdd_Product',['category'=>$arCate]);
    }

    public function Infoproduct(Request $request,$id)
    {
        $arCate = Category::find($id);
        return view('admin.product.add_product', ['category'=> $arCate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->idcate;
        $code= trim($request->code);
        $name= trim($request->name);
        $detail= trim($request->detail);
        $avata = $request->avata;
        $date  = date('Y-m-d H:i:s');
        $inputs = $request->all();
        $rules = array(
            'name' => 'required|min:5',
            'code' => 'required|min:5',
            'detail' => 'required|min:5',
            );
        $message = array(
            'required' => 'Xin mời nhập !',
            'min'      => 'Nhỏ nhất là 5 kí tự',
            );
        $validator = Validator::make($inputs, $rules, $message);
        if ($validator->fails()) {
            return redirect()->route('admin.add.product',['id'=> $id])
                        ->withErrors($validator)
                        ->withInput();
        }
        $arhash = Product::where('code','=',$code)->get();
        
        if (count($arhash) > 0 ) {
            $request->session()->flash('msg-e', 'Sản phẩm tồn tại !');
            return redirect()->route('admin.listproduct');
        }else{
            $endPic="";
            if ($avata != "") {
                $path = $request->file('avata')->store('public/products');
                $tmp  = explode('/',$path);
                $endPic = end($tmp);
            }
            $arProduct = array(
                'code' => $code ,
                'name' => $name,
                'detail' => $name,
                'picture'  => $endPic,
                'price' => 0,
                'price_old' =>0,
                'quantity'  => 0,
                'active' => $request->display,
                'category_id' => $id,
                'user_id' => $request->user_id,
                'view' => 1,
                'created_at' => $date
                );
            
            if(Product::insert($arProduct)){

                $arProductNew = Product::where('code','=',$code)->select('id')->get();

                $idProduct = $arProductNew[0]->id;
                session()->put('IDCate',$id);
                return redirect()->route('admin.addParameters.product',['id'=>$idProduct]);

            }else{

                $request->session()->flash('msg-e', 'Thêm thất bại !');
                return redirect()->route('admin.listproduct');

            }
        }
        
    }



    public function addParameters($id)
    {
        $arparameters = Session::get('parameters');
        // dd($id);
        return view('admin.product.addParameters',['id'=>$id, 'parameters'=>$arparameters]);
    }




    public function addParaAjax(Request $request)
    {
        $idpara = $request->aidpara;
        $idproduct = $request->aidproduct;
        $namepara = $request->anamePara;
        $nameContent = trim($request->anameContent);

        if ($nameContent == "") {
            return 'Thêm thất bại !';
        }
        $aradd = array(
                    'product_id'=> $idproduct,
                    'parameter_id'=> $idpara,
                    'content'   => $nameContent
                );
        // dd($aradd);
        Parameter_detail::insert($aradd);

        return 'Thêm thành công !';
    }

    public function getParaNewAdd(Request $request)
    {
        $idproduct = $request->aid;

        $arParaNewAdd = DB::table('parameter_detail')->join('parameters', 'parameter_detail.parameter_id','=','parameters.id')->select('parameter_detail.*','parameters.name')->where('parameter_detail.product_id','=',$idproduct)->get();
        // dd($arParaNewAdd[0]->name);
        $str ="";
        foreach ($arParaNewAdd as $key => $value) {
            $str .= '<tr>
                        <td>'.$value->name.'</td>
                        <td>'.$value->content.'</td>
                        <td><a href="javascript:void(0)" onclick="destroy('.$value->id.')" class="text-red"><i class="fa fa-trash-o"> Delete</i></a></td>
                    </tr>
                ';
        }
        return $str;
    }


    public function ajaxListPara(Request $request)
    {
        $id = $request->aid;
        $parameters = DB::table('paracatedetail')->join('parameters', 'paracatedetail.parameters_id','=','parameters.id')->join('category','paracatedetail.category_id','=','category.id')->select('parameters.*')->where('paracatedetail.category_id','=',$id)->get();

        $str ="";
        foreach ($parameters as $key => $value) {
            $str .= '<option value="'.$value->id.'">'.$value->name.'</option>
                ';
        }
        return $str;
    }

    public function destroyPara(Request $request)
    {
        $id = $request->aid;
        $arPara = Parameter_detail::find($id);
        $arPara->delete();
        return 'Xóa thành công !';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arProduct = DB::table('Products')->join('category', 'Products.category_id','=','category.id')->select('Products.*','category.name as nameCate','category.id as idCate')->where('Products.id','=',$id)->get();
        $arCate = Category::all();
        $parameters = Parameter::all();
        // dd($arProduct);
        return view('admin.product.edit',['product'=>$arProduct,'category'=>$arCate,'parameters'=>$parameters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = Product::find($id);
        
        $inputs = $request->all();
        $rules = array(
            'name' => 'required|min:5',
            'code' => 'required|min:5',
            'detail' => 'required|min:5',
            );
        $message = array(
            'required' => 'Xin mời nhập !',
            'min'      => 'Nhỏ nhất là 5 kí tự',
            );
        $validator = Validator::make($inputs, $rules, $message);
        if ($validator->fails()) {
            return redirect()->route('admin.edit.product',['id'=> $id])
                        ->withErrors($validator)
                        ->withInput();
        }
        $obj->code = trim($request->code);
        $obj->name= trim($request->name);
        $obj->detail= trim($request->detail);

        $avata = $request->avata;

        if ($avata != "") {
            $tenanhcu = $obj->picture; //data
            $pathOldPic = storage_path('public/products/'.$tenanhcu);
            //is_file kiểm tra khác rỗng
            if (is_file($pathOldPic) && ($tenanhcu != "") ) {
                //xóa ảnh cũ
                Storage::delete('public/products/'.$tenanhcu); // xóa trong file
            }
            $path = $request->file('avata')->store('public/products');
            $tmp  = explode('/',$path);
            $obj->picture = end($tmp);
        }
        
        
        if( $obj->update() ){
            // dd('ok ');
            $request->session()->flash('msg-s', 'Update thành công !');
            return redirect()->route('admin.listproduct');
        }else{
            $request->session()->flash('msg-e', 'Update thất bại !');
            return redirect()->route('admin.listproduct');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $arProduct = Product::find($id);
        if ($arProduct == null) {
            $request->session()->flash('msg-e', 'Sản phẩm không tồn tại !');
            return redirect()->route('admin.listproduct');
        }
        $tenanhcu = $arProduct->picture; //data
        $pathOldPic = storage_path('public/products/'.$tenanhcu);
        //is_file kiểm tra khác rỗng
        if (is_file($pathOldPic) && ($tenanhcu != "") ) {
            //xóa ảnh cũ
            Storage::delete('public/products/'.$tenanhcu); // xóa trong file
        }
        if(count(Parameter_detail::where('product_id','=',$id)->get()) > 0)
        {
            Parameter_detail::where('product_id','=',$id)->delete();
        }
        
        if (count(Comment::where('product_id','=',$id)->get()) > 0) {
            Comment::where('product_id','=',$id)->delete();
        }
        $arProduct->delete();

        $request->session()->flash('msg-s', 'Xóa thành công !');
        return redirect()->route('admin.listproduct');
    }

    public function destroymuch( Request $request)
    {
        $listProduct = $request->checkall;
        if ($listProduct == null) {
            $request->session()->flash('msg-e','Mời chọn để xóa !');
            return redirect()->route('admin.listproduct');
        }
        for ($i=0; $i < count($listProduct); $i++) { 
            $arProduct = Product::find($listProduct[$i]);
            $picture = $arProduct['picture'];
            $arProduct->delete();
            if ($picture != "") {
                Storage::delete('public/products/'.$picture);
            }
            // dd($arNew);
        }
        $request->session()->flash('msg-s','Xóa thành công');
        return redirect()->route('admin.listproduct');
        
        

    }
}
