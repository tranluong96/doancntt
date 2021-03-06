<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Permissions;
use App\permission_users;
use App\User;

class PermissionController extends Controller
{
    public function index()
    {
    	$arpermis = Permissions::all();
    	$arUser = DB::table('users')
            ->join('permission_user', 'users.id', '=', 'permission_user.user_id')
            ->select('users.*', 'permission_user.user_id', 'permission_user.id as idperuser', 'permission_user.permission_id' )
            ->get();
     	return view('admin.user.permission', [ 'arpermis'=>$arpermis, 'aruser'=>$arUser]);
    }

    public function store(Request $request)
    {
    	$inputs = $request->all();
        $rules = array(
            'name' => 'required'
            );
        $message = array(
            'required' => 'Xin mời nhập !'
            );
        $validator = Validator::make($inputs, $rules, $message);
        if ($validator->fails()) {
            return redirect('/adminpc/User/user-permission')
                        ->withErrors($validator)
                        ->withInput();
        }
        $name = trim($request->name);
        $arpermission  = array(
        	'name' => $name, 
        );
        Permissions::insert($arpermission);
        $request->session()->flash('msg-s','Thêm Thành Công ');
                return redirect()->route('admin.userPermission');
    }

    public function setPermission(Request $request)
    {
    	$iduser = $request->auser;
    	$idpermis= $request->apermis;
    	$idperuser = $request->aidperuser;
    	if($idpermis == 1){
    		return 0;
    	}
    	if ($idperuser > 0 ) {
    		DB::table('permission_user')->where('id', $idperuser)->update(['permission_id' => $idpermis]);
    		return 1;
    	}
    }

    public function update(Request $request)
    {
    	$id = $request->aid;
    	$name = trim($request->aname);
		$objper = Permissions::find($id);
    	$objper->name = $name;
    	$objper->update();
    	return $name;
    }



    public function destroy(Request $request, $id)
    {
    	// dd('chạy');
    	$arper = Permissions::find($id);
    	if ($arper == null ) {
    		$request->session()->flash('msg-e',"Xóa thất bại !");
    		return redirect()->route('admin.userPermission');
    	}
    	$arper->delete();
    	$request->session()->flash('msg-e',"Xóa thành công !");
    	return redirect()->route('admin.userPermission');
    }
}
