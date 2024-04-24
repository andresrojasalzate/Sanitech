<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

	public function lastConnectionUser()
	{
		$date = strval(now()->format('d/m/Y H:i'));
		$user = User::findOrfail(Auth::user()->id);
		$user->last_connection = $date;
		$user->save();
	}

	public function login(Request $request)
	{
		// Comprobamos que el email y la contraseña llegan correctamente en el request
		$request->validate([
			'dni' => 'required',
			'password' => 'required',
		]);

		// Se extraen las credenciales necesarios para login desde el request recibido
		$credentials = $request->only('dni', 'password');

		// Si son correctas las credenciales se realiza el login y redirige a la pantalla "home" correspondiente
		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			// $userData = Auth::user();
			return redirect()->intended(route('home'));
		}

		// Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
		return redirect()->route('login')->with('error', 'Credencials incorrectes, intenti de nou.');
	}

	public function logout()
	{
		self::lastConnectionUser();
		Log::info('logout');
		
		session()->flush();
		Auth::logout();

		return redirect('login');
	}
}
