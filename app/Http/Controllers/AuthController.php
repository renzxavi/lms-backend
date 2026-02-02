<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Normalizamos el email (quitar espacios y dejar en minúsculas internamente)
            if ($request->has('email')) {
                $request->merge(['email' => strtolower(trim($request->email))]);
            }

            $validated = $request->validate([
                'name'      => ['required', 'string', 'max:255'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone'     => ['nullable', 'string', 'max:20'],
                'password'  => ['required', 'confirmed', Rules\Password::defaults()->min(8)],
                'institution' => ['nullable', 'string', 'max:255'],
                'address'   => ['nullable', 'string', 'max:255'],
            ], [
                'name.required'     => 'El nombre es obligatorio.',
                'email.required'    => 'El correo electrónico es obligatorio.',
                'email.unique'      => 'Este correo ya está registrado.',
                'password.min'      => 'La contraseña debe tener al menos 8 caracteres.',
                'password.confirmed'=> 'Las contraseñas no coinciden.',
            ]);

            $user = User::create([
                'name'        => $validated['name'],
                'email'       => $validated['email'],
                'phone'       => $validated['phone'],
                'institution' => $request->institution,
                'address'     => $request->address,
                'password'    => Hash::make($validated['password']),
                'role'        => 'student',
                'total_points'=> 0,
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'user'    => $user,
                'token'   => $token,
                'message' => '¡Usuario registrado correctamente!'
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error en el servidor', 'error' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $email = strtolower(trim($request->email));

        if (!Auth::attempt(['email' => $email, 'password' => $request->password])) {
            return response()->json(['message' => 'Credenciales incorrectas.'], 401);
        }

        $user = Auth::user();
        return response()->json([
            'user'  => $user,
            'token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }

    // ✅ MÉTODO FALTANTE 1: Obtener usuario autenticado
    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    // ✅ MÉTODO FALTANTE 2: Cerrar sesión
    public function logout(Request $request)
    {
        // Elimina el token actual del usuario
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente.'
        ]);
    }
}