<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index() {
        return view('mahasiswa.auth.login');
    }

    function login_process(Request $request) {
        $input = $request->only(['nim','password']); 
        if (Auth::guard('mahasiswa')->attempt($input)) {
            return redirect()->route('mahasiswa.presensi');
        }else{
            return 'Login gagal';
        }
    }

    function logout() {
        Auth::guard('mahasiswa')->logout();
        return redirect()->route('mahasiswa.login');
    }
}
