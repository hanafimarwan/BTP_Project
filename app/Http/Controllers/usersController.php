<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class usersController extends Controller
{
    public function login(){
        return view('Users.login');
    }
    public function homes(Request $request){
        $tests = Comment::limit(5)->get();
        $data = ['name'=>$request->cookie('name'),'email'=>$request->cookie('email'),'com'=>$tests];
        return view('home.Home',['data'=>$data]);
    }
    public function singup(){
        return view('Users.Singup');
    }

    public function store(Request $request){
        // Validate the incoming request data
        $data = $request->validate([
            "name" => 'required', 
            "email" => 'required|email|unique:users,email',
            "password" => 'required|min:8',
            "code" => 'required|min:7|max:7'
        ]);
    
        // Check if the code matches the session code
        if ($data['code'] == Session::get('code')) {
            // Hash the password
            $data['password'] = Hash::make($data['password']);
            
            // Create the user
            $newUser = Users::create([
                "name" => $data['name'],
                "email" => $data['email'],
                "password" => $data['password']
            ]);
            
            // Redirect to the home page
            return redirect('/');
        } else {
            // If the code doesn't match, return to the signup page with an error message
            return redirect()->back()->withErrors(['code' => 'The provided code is incorrect.'])->withInput();
        }
    }

    public function log(Request $request)
{
    // Validate the incoming request data
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'code'=>'required'
    ]);
    if ($credentials['code'] == Session::get('code')) {

        // Attempt to authenticate the user with the provided credentials
        if (Auth::attempt([
            "email" => $credentials['email'],
            "password" => $credentials['password']
        ])) {
            // Authentication passed...
            $user = Auth::user(); // Get the authenticated user
            
            // Set the name and email cookies
            $response = redirect()->route('homes')
            ->withCookie(Cookie::make('name', $user->name, 1440)) // Set the name cookie for 1440 minutes (24 hours)
            ->withCookie(Cookie::make('email', $user->email, 1440)); // Set the email cookie for 1440 minutes (24 hours)
            
            return $response;
        } else {
            // Authentication failed...
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }else {
        // If the code doesn't match, return to the signup page with an error message
        return redirect()->back()->withErrors(['code' => 'The provided code is incorrect.'])->withInput();
    }
}
    

    public function com(Request $request){
        $data = ['name'=>$request->cookie('name'),'email'=>$request->cookie('email') ];
        $credentials = $request->validate([
            'com' => 'required',
        ]);
        $d = ['email' => $data['email'],'com' => $credentials['com']];
        $newUser = Comment::create($d);
        $tests = Comment::latest()->take(5)->get();
        $data = ['name'=>$request->cookie('name'),'email'=>$request->cookie('email'),"com"=>$tests ];
        return view('home.Home',['data'=>$data]);
    }
    public function  logout(){
        $response = redirect()->route('homes');
        $response->withCookie(Cookie::forget('name'));
        $response->withCookie(Cookie::forget('email'));
    
        return $response;
    }
}
