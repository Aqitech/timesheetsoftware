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

    public function checkcurrentpassword(Request $request){
        if (Hash::check($request->current_password, Auth::User()->password)){
            $status= 200;
        }else{
            $status=404;
        }
        return response()->json([
            'status'=>$status 
        ]);
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

            if (Hash::check($input['current_password'], $user->password)) {
                if ($input['new_password'] == $input['new_confirm_password']) {
                    // Update password
                    User::find(auth()->user()->id)->update(['password'=> Hash::make($input['new_password'])]);

                    Session::flash('success','Password has been changed Successfully!');
                }
            }else{
                Session::flash('danger','The New Password & Confirm you have entered does not match!');

                return Redirect()->route('dashboard');
            }
        }

        $error = 'you are not allowed to access';
        return Redirect()->route('index')->with(compact('error'));
    }
}
