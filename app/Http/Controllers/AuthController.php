<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function showForm()
    {
        return view('auth');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('user_id', 'password');

        if (Auth::attempt(['user_id' => $credentials['user_id'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Sign in Success!');
        }

        return back()
            ->withErrors([
                'login' => 'The ID or password is incorrect!',
            ])
            ->withInput()
            ->with('form_type', 'login');
    }

    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'user_id' => 'required|string|unique:users,user_id',
            'password' => 'required|string|min:6',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_type', 'register')
                ->with('register_failed', true);
        }

        try {
            User::create([
                'user_id' => $request->user_id,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'email' => $request->email,
            ]);
        } catch (\Exception $e) {
            \Log::error('회원가입 실패: '.$e->getMessage());
            return back()
                ->withErrors(['register' => '회원가입 중 문제가 발생했습니다.'])
                ->withInput()
                ->with('form_type', 'register')
                ->with('register_failed', true);
        }

        return redirect('/auth')
            ->with('success', 'Sign up Success!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth')->with('success', 'You have been logged out.');
    }
}
