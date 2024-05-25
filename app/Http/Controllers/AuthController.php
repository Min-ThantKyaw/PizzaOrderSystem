<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Dashboard
    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('category#listPage');
        } else {
            return redirect()->route('user#home');
        }
    }

    //Direct Login Page
    public function loginPage()
    {

        return view('login');
    }
    //Direct Register Page
    public function registerPage()
    {

        return view('register');
    }

    //Admin Password Change Page
    public function adminPasswordChange()
    {
        return view('admin.password.change');
    }

    //Change Password
    public function changePassword(Request $request)
    {

        //$this->changePasswordValidationCheck($request);
        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id', $currentUserId)->first();
        $dbPassword = $user->password;
        if (Hash::check($request->oldPassword, $dbPassword)) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->newPassword),
            ]);
            Auth::logout();
            return redirect()->route('auth#loginPage');
        }
        return back()->with(['notMatch' => 'Old Password is not correct.']);
    }


    //Private Function
    //Change Password Validation Check
    private function changePasswordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword',
        ], [])->validate();
    }
}
