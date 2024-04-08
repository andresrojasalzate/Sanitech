<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
	{
	    // Comprobamos que el email y la contraseña han sido introducidos
	    $request->validate([
	        'email' => 'required',
	        'password' => 'required',
	    ]);
	
	    // Se extraen las credenciales necesarios para login desde el request recibido
	    $credentials = $request->only('email', 'password');
        
	    // Si son correctas las credenciales se realiza el login
	    if (Auth::attempt($credentials)) {
	        return redirect()->intended('home');
	    }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect()->route('login-page')->with('error', 'Credenciales incorrectas, intente de nuevo.');
	}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
