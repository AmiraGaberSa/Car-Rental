<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
       // $registrationDate = $users->created_at->format('j M Y');
        return view('admin.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'fullName'=>'required|string|max:50',
            'userName'=>'required|string|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8',
            ], $messages);  //send messages array with data array
         
            $data['active'] = isset($request->active);//و له قيمة تبقي ب 1 لو ما اخدش قيمة يبقي ب 0
            User::create($data);
            return redirect()->back();
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view ('admin.editUser',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'fullName'=>'required|string|max:50',
            'userName'=>'required|string|max:50',
            'email' => 'required|email',          
            ], $messages);  //send messages array with data array

            
            if ($request->has('newPassword')) {
                $data['password'] = Hash::make($request->newPassword);
            }
             
            $data['active'] = isset($request->active);//و له قيمة تبقي ب 1 لو ما اخدش قيمة يبقي ب 0
            User::where('id',$id)->update($data);
            return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function messages()
    {
        return [
            'fullName.required' => 'The full name field is required.',
            'fullName.string' => 'The full name should be a string.',
            'fullName.max' => 'The full name may not be greater than 50 characters.',
            'userName.required' => 'The username field is required.',
            'userName.string' => 'The username should be a string.',
            'userName.max' => 'The username may not be greater than 50 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters long.'
            
        ];
    }
}
