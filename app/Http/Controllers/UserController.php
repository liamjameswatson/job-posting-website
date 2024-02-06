<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Validation\Rule;
use function Laravel\Prompts\confirm;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User - send to database and store
    public function store(Request $request) {
        // dd($request);
        $formFields = $request->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users','email')], //unique to both users and email column in database table
        'password' => ['required','confirmed', 'min:6'] // confirmed will match whatever the name is (eg. password) with a field with the same name but with _confimation (eg. password_confirmation)
    ]);

    //Hash Password with Bcrypt
    $formFields['password'] = bcrypt($formFields['password']); // Take the password and sets it to the hashed password

    //Create User
    $user = User::create($formFields);

    // Log the user in upon creation
    auth()->login($user); //auth helper function

    return redirect('/')->with('message', 'User created and logged in successfully');
    
    }

    // Logout User
    public function logout(Request $request) {
        // use auth helper function to remove authentication from user session
        auth()->logout();

        // regenerate csrf token and invalidate further requests
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //redirect to login page
        return redirect('/')->with('message', 'You have been logged out');
    }

    //Show Login Form
    public function login() {
        return view('users.login');
    }

    //Login User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'] 
        ]);
        
        //use the attempt method to login 
        if(auth()->attempt($formFields)) {
            // if true, regenerate session with the request object
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You have been logged in successfully');
        };

        // if attempt failed, (is false), display 'Invalid Credentials' message in email
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');


    }
}
