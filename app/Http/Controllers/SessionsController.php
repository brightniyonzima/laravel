<?php namespace App\Http\Controllers;


use View;
//use App\Forms\LoginForm;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\VerifyLoginRequest;
use App\Models\User;
use App\Models\UserRole;
use Request;
use DB;
use App\Userlogs;
use Auth;
//use App\Http\Requests\Request;

class SessionsController extends Controller {

	/**
	 * @var Acme\Forms\LoginForm
	 */
	protected $loginForm;

	/**
	 * @param LoginForm $loginForm
	 */
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */


	public function store(LoginRequest $request, Users $user)
	{
		$user->create($request->all());
		return redirect()->route('home');
		//eturn View::make('dashboard');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{   
		\Auth::logout();
		\Session::flush();
		return redirect('/');
	}

	public function loginTo($domain, $jwt){
		
		$url = $domain . "?token=" . $jwt;
		return redirect($url);
	}

	public function postTime()
    {
    	$timestamp=time();
	    $readable_time=date('H:i:s',$timestamp+ 13 * 3600);
	    $date = date('D, d/M/y',$timestamp);
	    $timein = $readable_time.'Hrs';
	    $email = Auth::user()->email;
	    $user_id = Auth::user()->id;
	    //dd($user_id);
	    $userlog = Userlogs::create(['users_id'=>$user_id,'email'=>$email,'logdate'=>$date,'timeIn'=>$timein]);
	    $userlog->save();
	    return View('timeout');
    }

    public function timeout()
    {
    	$timestamp=time();
	    $readable_time=date('H:i:s',$timestamp+ 13 * 3600);
	    $date = date('D, d/M/y',$timestamp);
	    $timeout = $readable_time.'Hrs';
	    $email = Auth::user()->email;

	    $sql = "UPDATE userlogs SET timeout = '$timeout' WHERE logdate = '$date' AND email='$email'";
    	DB::unprepared( $sql );
	    Auth::logout();
	    return view('auth.login');
    }
}
