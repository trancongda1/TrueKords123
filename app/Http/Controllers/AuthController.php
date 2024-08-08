<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Method to handle user login
    public function login(Request $request)
    {
        // Retrieve email and password information from the request
        $credentials = $request->only('email', 'password');

        // Check user authentication
        if (Auth::attempt($credentials)) {
            // If authentication is successful, redirect to 'admin/admin' page
            return redirect()->intended('admin/admin');
        }

        // If unsuccessful, redirect back to the registration page with an error message
        return redirect('register')->with('error', 'Incorrect email or password!');
    }

    // Method to handle user logout
    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Redirect to '/register' page with a message indicating successful logout
        return redirect('/register')->with('error', 'You have been logged out. Please log in.');;
    }

    // Method to display the user registration form
    public function showRegistrationForm()
    {
        // Return the view of the registration form
        return view('auth.register');
    }

    // Method to handle user registration
    public function register(Request $request)
    {
        // Validate user input using Laravel's Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'The email has already been taken. Please choose another email.',
            'password.confirmed' => 'The password confirmation does not match. Please re-enter the password.',
        ]);

        // If validation fails, redirect back to the registration page with an error message
        if ($validator->fails()) {
            return redirect('register')->with('error', 'Email exists or password confirmation does not match!');
        }

        // If validation passes, create a new user in the database
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirect to the registration page with a success message
        return redirect('register')->with('success', 'Registration successful!');
    }
}
