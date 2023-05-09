<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UserType;
use App\Models\User;
use Session;
use Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function users() {
        if (Auth::User()->type_id == 1) {
            $title = 'Users';
            $users = User::where('is_deleted', 'N')->get();

            return view('users.index')->with(compact('title', 'users')); 
        }else{
            Session::flash('error', 'You do not have permission to access this route');

            return redirect()->back();
        }
        
    }

    public function add_user() {
        if (Auth::User()->type_id == 1) {
            $title = 'Add User';
            $userTypes = UserType::all();

            return view('users.add_user')->with(compact('title','userTypes'));
        }else{
            Session::flash('error', 'You do not have permission to access this route');

            return redirect()->back();
        }
    }

    public function store_user(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'designation' => 'required|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'type_id' => 'required'
        ]);

        $user = new User;
        $user->type_id = $request->type_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->start_time = $request->start_time;
        $user->end_time = $request->end_time;
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->status = 'A';
        $user->is_deleted = 'N';
        $user->remember_token = Str::random(10);
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();

        Session::flash('success', 'User Created successfully!');
        return redirect()->route('users');
    }

    public function edit_user($id) {
        if (Auth::User()->type_id == 1) {
            $title = 'Edit User';
            $user = User::find($id);
            $userTypes = UserType::all();

            return view('users.edit_user')->with(compact('title','user','userTypes'));
        }else{
            Session::flash('error', 'You do not have permission to access this route');

            return redirect()->back();
        }
    }

    public function update_user(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required',
            'designation' => 'required|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'type_id' => 'required'
        ]);

        $user = User::find($id);
        $user->type_id = $request->type_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->designation = $request->designation;
        $user->start_time = $request->start_time;
        $user->end_time = $request->end_time;
        $user->email_verified_at = now();
        $user->password = Hash::make('password');
        $user->status = 'A';
        $user->is_deleted = 'N';
        $user->remember_token = Str::random(10);
        $user->updated_at = now();
        $user->save();

        Session::flash('success', 'User Updated successfully!');
        return redirect()->route('users');
    }

    public function delete_user(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            User::where('id',$data['userId'])->update(['is_deleted'=>'Y']);
            return response()->json([
                'status'=>true,
                'message'=>'Record has been Deleted Successfully!'
            ]);
        }
    }

    public function user_status($id) {
        $user = User::find($id);
        if ($user->status == 'A') {
            $user->status = 'D';
            $user->save();
        }else{
            $user->status = 'A';
            $user->save();
        }

        Session::flash('success', "User's status updated successfully!");
        return redirect()->route('users');
    }

    public function profile($id) {
        $title = 'Profile';
        $profile = User::find($id);

        return view('users.profile')->with(compact('title','profile'));
    }

    public function update_theme(Request $request) {
        
    }
}
