<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Excel;
use App\transInput_orders;
use App\Products;

class EcxelController extends Controller
{

    public function ExportAddOrder(Request $req)
    {
    	$date = $req->adate;
    	$export = transInput_orders::where('created_at','=',$date)->get(); 
		// dd($export);
    	Excel::create('Báo cáo bán hàng', function($excel) use ($export){
		    	$excel->sheet('Sheet 1', function($sheet) use ($export){
					$sheet->fromArray($export);
				});
			})->download('xlsx');
    	return back();
	}

}
