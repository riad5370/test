<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        $users = User::whereNotIn('id', [1])->get();
        return view('admin.user.index',[
            'users'=>$users
        ]);
    }

    public function store(Request $request){
        $userdata = [
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'image'=> 'image|file|max:2048',
            'password'=> 'required|string|min:8',
            'password_confirmation'=> 'required|same:password',
        ];
        $validateData = $request->validate($userdata);
        $validateData['password'] = bcrypt($validateData['password']);

        if( $image = $request->file('image')){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/image/user/'), $imageName);
            $validateData['image'] = $imageName;
        }
        User::create($validateData);
        return back()->withSuccess('User created successfully');
    }

    
    public function delete(Request $request, $id){
        $user = User::find($id);
        
        if($user->image){
            if(file_exists(public_path('image/user/'.$user->image))){
                unlink(public_path('image/user/'.$user->image));
            }
        }
        $user->delete();
        return back()->with('success','deleted');
    }
}
