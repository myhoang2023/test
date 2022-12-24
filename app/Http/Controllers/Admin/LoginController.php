<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPostLogin;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('fake.login:user')->only(['index']);
    //     //$this->middleware('fake.login:user')->except('test');
    // }
    public function index(Request $request){

        return view('login.form_login');
    }
    public function test(){
        return "test";
    }
    public function handle(FormPostLogin $request){
        $user = $request->username;
        $pass = $request->password;
        $infoUser = User::where([
            'username'=>$user,
            'password'=>$pass,
            'status'=> 1
            ])->first();
        //dd($infoUser->toArray());
        if(!empty($infoUser)){
            $request->session()->put('username',$infoUser->username);
            $request->session()->put('idUser',$infoUser->id);
            $request->session()->put('email',$infoUser->email);
            $request->session()->put('phone',$infoUser->phone);
            $request->session()->put('roleId',$infoUser->role_id);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error_login','tai khoan ko ton tai');
        }
    }
    public function logout(Request $request){
        $request->session()->forget('username');
        //tuong duong unset($_SESSION['username'])
        return redirect()->route('admin.login');
    }
}
