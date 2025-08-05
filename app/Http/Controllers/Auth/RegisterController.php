<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{
    Hash,
    DB,
    Http,
    Validator
};

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    function showRegistrationForm()
    {
        $departments = DB::table('departments')->get();
        return view('auth.register', compact('departments'));
    }

    function register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'password' => 'required|min:8|confirmed',
                'department' => 'required',
                'agree' => 'required',
            ],
            [
                'name.required' => 'กรอกคำนำหน้าชื่อ - นามสกุล',
                'phone.required' => 'กรอกเบอร์โทรศัพท์',
                'email.required' => 'กรอกอีเมล',
                'password.required' => 'สร้างรหัสผ่าน',
                'password.min' => 'รหัสผ่านอย่างน้อย 8 ตัวอักษร',
                'password.confirmed' => 'รหัสผ่านไม่ตรงกัน',
                'department.required' => 'เลือกสังกัดกองของท่าน',
                'agree.required' => 'ต้องการยอมรับเงื่อนไข'
            ]
        );

        date_default_timezone_set('Asia/Bangkok');
        $date = date('Y-m-d H:i:s');

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'department' => $request->department,
            'status' => 'รอการตรวจสอบ',
            'created_at' => $date,
        ];

        DB::table('registers')->insert($data);
        return redirect()->route('login')->with('success', 'สมัครสมาชิกสำเร็จ');
    }
}
