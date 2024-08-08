<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Method to display the user login form
    public function showLoginForm()
    {
        return view('auth.register');
    }

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

        // If unsuccessful, redirect back to the login page with an error message
        return redirect('login')->with('error', 'Incorrect email or password!');
    }

    // Method to handle user logout
    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Redirect to the login page with a message indicating successful logout
        return redirect('login')->with('message', 'You have been logged out. Please log in.');
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
            return redirect('register')->withErrors($validator)->withInput();
        }

        // If validation passes, create a new user in the database
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirect to the login page with a success message
        return redirect('login')->with('success', 'Registration successful! You can now log in.');
    }
}
