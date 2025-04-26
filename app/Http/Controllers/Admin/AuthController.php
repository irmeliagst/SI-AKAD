<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login() {
        return view('admin.auth.login');
    }
    function login_process(Request $request) {
        $input = $request->only(['email','password']); 
        if (Auth::attempt($input)) {
            return redirect()->route('dosen.index');
        }else{
            return 'Login gagal';
        }
    }
    
    function logout() {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
