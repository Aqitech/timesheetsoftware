<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;

class AuthController extends Controller
{
    public function index() {
        return view('index');
    }

    public function login(Request $request) {
        $request->validate([
            'email' =>  'required',
            'password'  =>  'required'
        ]);

        $deletedUser = User::where(['status'=>'A','is_deleted'=>'N'])->where('email',$request->email)->first();

        if (!$deletedUser) {
            $error = "Unfortunately, you do not have permission to access this resource.";
            return Redirect()->route('index')->with(compact('error'));
        }else {
            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials)) {
                $success = 'You are login successfully';
                return redirect('dashboard')->with(compact('success'));
            }

            $error = 'Login details are not valid';
            return Redirect()->route('index')->with(compact('error'));
        }
    }

    public function dashboard() {
        if(Auth::check()) {
            $title = 'Dashboard';
            return view('dashboard')->with(compact('title'));
        }

        $error = 'you are not allowed to access';
        return Redirect()->route('index')->with(compact('error'));
    }

    public function logout() {
        Session::flush();

        Auth::logout();

        return Redirect()->route('index');
    }

    public function change_password() {
        if(Auth::check()) {
            $title = 'Change Password';
            return view('changePassword')->with(compact('title'));
        }

        $error = 'you are not allowed to access';
        return Redirect()->route('index')->with(compact('error'));
    }

    public function store_new_password(Request $request) {
        if(Auth::check()) {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required'],
                'new_confirm_password' => ['same:new_password'],
            ]);

            $input = $request->all();
            $user = User::find(Auth::user()->id);

            if (!Hash::check($input['current_password'], $user->password)) {
                Session::flash('success', 'Return error with current passowrd is not match.');
                return redirect()->back();
            }else{
                User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

                $success = 'Password change successfully.';
                return Redirect()->route('dashboard')->with(compact('success'));
            }
        }

        $error = 'you are not allowed to access';
        return Redirect()->route('index')->with(compact('error'));
    }
}
