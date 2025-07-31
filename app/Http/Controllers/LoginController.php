<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if(Auth::attempt(['name' => $credentials['name'], 'password' => $credentials['password']])) {

            $request->session()->regenerate();
            
            if(Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            if(Auth::user()->isCustomer()) {
                return redirect()->route('customer.panel');
            }
            if(Auth::user()->isEntrepreneur()) {
                return redirect()->route('entrepreneur.panel');
            }
        }

        return back()->with([
            'message' => 'Credenciales incorrectas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('/');
    }
}
