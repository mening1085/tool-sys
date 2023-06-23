<?php

namespace App\Http\Controllers;

use App\Mail\SenndMailNewUser;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('pages.index');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {

            // check status user
            if (auth()->user()->status == 0) {
                auth()->logout();
                return redirect()->route('login')->with('error', 'Your account is inactive');
            }

            // if role is admin
            if (auth()->user()->role == 1) {

                return redirect()->route('tools.index');
            }
            // if role is user
            return redirect()->route('pages.index');
        }

        return redirect()->route('login')->with('error', 'Email or password is incorrect');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->status = $request['status'];
        $user->password = bcrypt($request['password']);
        $user->save();

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
    public function createRegister()
    {
        return view('register');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed|min:4',
            'email' => 'required|email|unique:users,email',
        ], [
            'first_name.required' => 'Name field is required.',
            'last_name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'password.confirmed' => 'Password and confirm password must be same.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
        ]);

        DB::beginTransaction();

        try {
            $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['role'] = 2;
            $validatedData['status'] = 2;

            User::create($validatedData);

            // send email to admin
            Mail::to($validatedData['email'])->send(new SenndMailNewUser($validatedData));

            DB::commit();

            return redirect()->route('login')
                ->with('success', 'สมัครสมาชิกเรียบร้อยแล้ว ผู้ดูแลระบบจะทำการตรวจสอบข้อมูลและจะแจ้งผลการอนุมัติให้ทราบทางอีเมล์');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Register failed.' . $e->getMessage());
        }
    }
}
