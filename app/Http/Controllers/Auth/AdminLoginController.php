<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

	
	protected $redirectTo = 'admin/home';


	public function __construct()
	{
		 $this->middleware('guest:admin', ['except' => ['logout','adminlogout']]);
	}

    public function showAdminLogin()
    {
    	return view('auth.adminlogin');
    }

    public function adminLogin(Request $request)
    {
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    		]);

    	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function adminlogout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }


}
