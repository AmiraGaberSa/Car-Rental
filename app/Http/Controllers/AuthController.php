<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $showLoginForm = true;
        $showRegistrationForm = false;
        return view('login', compact('showLoginForm', 'showRegistrationForm'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('userName', 'password');

       if (Auth::attempt($credentials)) {
        // Authentication passed...
        $user = Auth::user();
        if ($user->active == 0) {
            return redirect()->intended('/');
        }
        Session::put('fullName', $user->fullName); // Store the user's name in session
        return redirect()->intended('admin/users'); // Redirect to admin dashboard 
    }

       return redirect()->back()->withErrors(['error' => 'Invalid username or password']);
    }


    public function logout()
    {
         
        Auth::logout();
        Session::forget('userName'); // Remove the user's name from session
        return redirect()->route('home');
    }


    public function showRegistrationForm()
    {
        $showLoginForm = false;
        $showRegistrationForm = true;
        return view('login', compact('showLoginForm', 'showRegistrationForm'));
    }

    public function store(Request $request)
    {
       // $messages = $this->messages();
        $validator = Validator::make($request->all(),[
            'fullName' => 'required|string|max:50',
            'userName' => 'required|string|unique:users,userName|max:50',
            'email' => 'required|email',
            'password' => 'required|string|min:6',    
            ], $this->messages());  
            
                   // Checking if validation fails
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(); // Retain the input values
        }

        $data = [
            'fullName' => $request->input('fullName'),
            'userName' => $request->input('userName'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hashing the password
        ];
       
            
           // User::create($data);
            $user = User::create($data);
            $user->sendEmailVerificationNotification(); // Send verification email
            return redirect()->route('index')->with('success', 'Registration successful. Please verify your email.');;
    
    }

    public function messages()
    {
        return [
            'userName.string' => 'Should be a string',
            'userName.required' => 'User Name is required',            
            'fullName.string' => 'Should be a string',
            'password.required' => 'Password is required',
            'email.required' => 'Email is required',
            'userName.unique' => 'This User Name has already been taken',
            'email.email' => 'Invalid email format',
            'password.min' => 'Password should be at least 6 characters long'
            
        ];
    }

   

}
