<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //kiem tra session co ton tai ko, neu ko thi quay ve login
        $username=$request->session()->get('username');
        if(!$this->checkLogin($username)){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }

     
    private function checkLogin($username){
        
        if(!empty($username)){
            return true;
        }
        return false;
    }
}
