<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->intended('home');
    }

    public function index()
    {
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){
        // dd($request);
        
        $creds = $request -> validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|confirmed',
        ],[
            'name.required' => 'name must be filled',
            'name.min' => 'name must be more than 3',
            'email.unique' => 'email must be unique',
            'email.required' => 'email is required',
            'password.required' => 'password is required',
            'password.confirmed' => 'password mismatch'
        ]);

        // dd($creds); 

        User::create([
            'name' => $creds['name'],
            'email' => $creds['email'],
            'password' => bcrypt($creds['password']),
        ]);

        return redirect()->intended('login');
        
    }

    public function login(Request $request){
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'email is required',
            'password.required' => 'password is required'
        ]);

        if($request->remember == "on"){
            session(['email' => $request->email, 'password' => $request->password]);
        }
        
        if (Auth::attempt($credential, $request->remember == "on")) {
            return redirect()->intended('home');
        }


        return back()->withErrors([
            'email' => 'The provided credentials is not valid',
        ])->onlyInput('email');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request)
    {

        $request -> validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:App\Models\User,email',
        ],[
            'name.required' => 'name must be filled',
            'name.min' => 'name must be more than 3',
            'email.unique' => 'email must be unique',
            'email.required' => 'email is required',
            'email.email' => 'not a valid email'
        ]);


        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;
        
        $user->save();

        return redirect('/edit-profile')->with('status', 'Profile edited');
    }

    public function editProfileView(){
        return view('edit_profile');
    }
    public function editPasswordView(Request $request){
        return view('edit_password');
    }

    public function editPassword(Request $request)
    {
        $creds = $request -> validate([
            'password' => 'current_password',
            'newpassword' => 'required|confirmed',
        ],[
            'password.required' => 'wrong password|min:6',
            'newpassword.required' => 'password must be filled'
        ]);

        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->newpassword  );
        $user->save();

        return redirect('/edit-password')->with('status', 'Password changed');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
