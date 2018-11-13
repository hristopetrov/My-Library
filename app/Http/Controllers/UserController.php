<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
     public function getSignup(){
       return view('user.signup');
   }
    public function postSignup(Request $request){
       $this->validate($request,[
       	   'firstname' => 'required|min:2',
       	   'lastname' => 'required|min:2',
       	   'username' => 'required|min:3',
           'email'=> 'email|required|unique:users',
           'password' => 'required|min:4'
       ]);
       $user = new User([
       	   'firstname' => $request->input('firstname'),
       	   'lastname'  => $request->input('lastname'),
       	   'username'  => $request->input('username'),
           'email' => $request->input('email'),
           'password' => bcrypt($request->input('password')),
        ]);
       $user->save();
       Auth::login($user);
        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }
       return redirect()->route('homepage');
    }
    public function getSignin(){
        return view('user.signin');
    }
    public function postSignin(Request $request){
        $this->validate($request,[
            'email'=> 'email|required',
            'password' => 'required|min:4'
        ]);
      if(Auth::attempt([
            'email' => $request->input('email'),
            'password' =>$request->input('password')
        ])){
          if(Session::has('oldUrl')){
              $oldUrl = Session::get('oldUrl');
              Session::forget('oldUrl');
              return redirect()->to($oldUrl);
          }
        return redirect()->route('library.library');
      }
      return redirect()->back();
    }
    public function editProfile(){
    	$user = Auth::user();
        return view('user.profile',['user'=>$user]);
    }

    public function updateProfile(Request $request, $id){
    	$this->validate($request,[
    	  'email'=> 'email|required',
    	]);
    	$user = User::find($id);
    	$user->update($request->all());		
       return redirect()->route('homepage');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }

}
