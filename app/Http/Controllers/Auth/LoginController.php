<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Log, Http};

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username() 
    {
        return 'phone';
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate(
            $request,
            [
                'phone' => 'required|min:10',
                'password' => 'required',
            ],
            [
                'phone.required' => 'กรุณากรอกหมายเลขโทรศัพท์',
                'phone.min' => 'หมายเลขโทรศัพท์ต้องมี 10 หลัก',
                'password.required' => 'กรุณากรอกรหัสผ่าน',
            ]
        );

        $date = now()->format('Y-m-d H:i:s');

        if (Auth::attempt(['phone' => $input['phone'], 'password' => $input['password']])) {
            Log::info('Login Success: '. Auth::user()->name .' ('. Auth::user()->phone .')');
            return Auth::user()->is_admin ? redirect()->route('home') : redirect()->route('home');

        } else {
            Log::warning('Login Failed: ' . $request->phone);
            return redirect('/login')->with('error', 'ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง');
        }
    }
}
