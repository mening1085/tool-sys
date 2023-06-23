<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('login');
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

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function thirdPartyLogin(Request $request)
    {
        // ส่งคำขอไปยัง third-party API สำหรับการเข้าสู่ระบบ
        try {
            $client = new Client();
            $response = $client->get("http://127.0.0.1:8001/api/login?email=" . $request['email'] . "&password=" . $request['password']);


            // ตรวจสอบคำตอบจาก third-party API
            $data = json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 201 && $data) {
                // ทำการเข้าสู่ระบบผ่าน Laravel
                auth()->loginUsingId($data['user']['id']);

                // ถ้าไม่มีผู้ใช้ในระบบ ให้สร้างผู้ใช้ใหม่
                if (!User::where('email', $data['user']['email'])->first()) {
                    $user = new User();
                    $user->name = $data['user']['name'];
                    $user->email = $data['user']['email'];
                    $user->password = $data['user']['password'];
                    $user->save();
                }
                dd($data['user'], auth()->user());
                return redirect()->route('tools.index');
            } else {
                // dd(111);
                return redirect('/login')->with('error', 'ไม่สามารถเข้าสู่ระบบได้'); // หรือทำการตอบกลับตามที่คุณต้องการ
            }
        } catch (\Throwable $th) {
            //throw $th;

            return redirect('/login')->with('error', 'ไม่สามารถเข้าสู่ระบบได้'); // หรือทำการตอบกลับตามที่คุณต้องการ
        }
    }
}
