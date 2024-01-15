<?php

namespace App\Http\Controllers;

use App\Models\lines;
use App\Models\Prodak;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line for Auth facade

class HomeController extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
      $lines = Lines::all();
      $prodaks = Prodak::all();
      return view('prodak.index', compact('prodaks', 'lines'));
   }


   public function logout(Request $request)
   {
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      // Clear user-related session data
      $request->session()->forget(['user_name', 'user_role']);

      return redirect('/login');
   }

   public function register(Request $request)
   {
      // Validate registration data
      $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:8|confirmed',
         'role' => 'required', // Sesuaikan dengan aturan validasi untuk role
      ]);

      // Create a new user
      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = bcrypt($request->input('password'));
      $user->role = $request->input('role');
      $user->save();

      // Log in the user and store user details in the session
      Auth::login($user);
      session(['name' => $user->name, 'user_role' => $user->role]);

      return redirect('/dashboard');
   }

   public function login(Request $request)
   {
      // Your existing login logic
      if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
         $user = Auth::user();

         // Store user details in the session
         session(['name' => $user->name, 'user_role' => $user->role]);

         return redirect('/dashboard'); // Adjust the redirection URL
      } else {
         // Handle login failure
         return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'Invalid email or password']);
      }
   }
}
