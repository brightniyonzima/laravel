<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use Request;
use DB;
use App\Userlogs;
use App\Users;
use Auth;

class UserlogsController extends Controller
{
	/*public function __construct()
	{
		$this->middleware('auth',['only'=>'report']);
	}*/

    public function index()
    {
    	$logs = Userlogs::where('email', Auth::user()->email)->orderBy('timein','asc')->get()->toArray();
    	//dd($logs);
    	$staff = Users::where('email', Auth::user()->email)->get()->toArray();
    	//dd($staff);
    	return view('report',compact('logs','staff'));
    }

    public function create(Request $request)
    {
    	$new_user = Request::all(); 
    	//dd($new_user);
    	$ok = Users::create(['name'=>$new_user['name'],'email'=>$new_user['email'],'role'=>$new_user['role'],'password'=>bcrypt($new_user['password']),'remember_token'=>$new_user['_token']]);
    	if (!$ok) {
    		dd('fill in all details properly');
    	}
    	dd('new user created');
    }

    public function edit()
    {
    	$id = $_GET['id'];
    	$user = Users::findOrfail($id);
    	return view('userdetails', compact('user'));
    }

    public function update()
    {
    	$user = Users::findOrfail();
    	dd($user);

    }

    public function showUsers()
    {
    	$all_staff = Users::all()->toArray();
    	return view('staff', compact('all_staff'));
    }

    public function addUser()
    {
    	return view('auth.register');
    }

    public function deleteuser()
    {
    	//dd($_GET['id']);
    	$id = $_GET['id'];
    	$staff = Users::findOrfail($id);
    	$staff->delete();
    	return 'user has been deleted';
    	//$staff = Users::delete
    }

    public function makeExcel()
    {
        return \App\Lib\Excels::make_excel();     
    }
}
