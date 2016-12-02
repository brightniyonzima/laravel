<?php

namespace App\Lib;
/**
* 
*/
//use Faker\Factory as Faker;
use DB;
use Auth;
use App\Userlogs;
use Excel;
/**
* 
*/
class Excels
{
	static function make_excel()
	{
    $data=[];
    $id = Auth::user()->id;
    $userlogs = Userlogs::findOrfail($id)->get()->toArray();
    //$userlogs = DB::select( $sql );
    //dd($userlogs);
    $data=$userlogs;

		return Excel::create('Userlogs', function($excel) use ($data) {
			$excel->sheet('login_Sheet', function($sheet) use ($data)
			{
				$sheet->fromArray($data, null, 'A2', false, true);
			    $sheet->mergeCells('A1:L1');
			    $sheet->row(1, function ($row) {			        
			        $row->setFontSize(20);
			    });
			    $sheet->row(1, array(' '));
			});
		})->download('xls');
	}
}
	
