<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminResetPasswordRequest;
use App\Http\Requests\HandleLoginRequest;
use App\Http\Requests\SendResetLinkRequest;
use App\Mail\AdminSendRequestLinkMail;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminAuthenticationController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function handle_login(HandleLoginRequest $request)
    {
        $request->authenticate();
        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function forgotPassword()
    {
        return view('backend.auth.forgot-password');
    }

    public function sendRestLink(SendResetLinkRequest $request)
    {
        $token = \Str::random(64);
        $admin = Admin::where('email', $request->email)->first();
        $admin->remember_token = $token;
        $admin->save();

        Mail::to($request->email)->send(new AdminSendRequestLinkMail($token, $request->email));

        return redirect()->back()->with('success', 'ایمیل با موفقیت برای شما ارسال شد. لطفا ایمیل آدرس خود ر چک کنید.');
    }

    public function resetPassword($token)
    {
        return view('backend.auth.reset-password', compact('token')); 

    }

    public function handleResetPassword(AdminResetPasswordRequest $request)
    {   
        $admin = Admin::where(['email' => $request->email, 'remember_token' => $request->token])->first();

        if(!$admin) {

            return back()->with('error', 'توکن شما غیر معتبر هست.');
        }

        $admin->password = bcrypt($request->password);
        $admin->remember_token = null;
        $admin->save();

        return redirect()->route('admin.login')->with('success', 'پسورد شما با موفقیت ریست شد.');

    }
}
