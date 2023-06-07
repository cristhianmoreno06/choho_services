<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Request\Login\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Passport;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function attemptLogin(LoginRequest $request): JsonResponse
    {
        try {
            $user = User::whereUsername($request->get('username'))->first();

            if (is_null($user)) {
                return response()->json([
                    "error" => 'El usuario no es correcto'
                ], Response::HTTP_BAD_REQUEST);
            } elseif($user->activo == 0) {
                return response()->json([
                    "error" => 'El usuario no esta activo'
                ], Response::HTTP_UNAUTHORIZED);
            } else {
                $user->toArray();
            }

            if (Hash::check($request->get('password'), $user['password'])) {
                Passport::tokensExpireIn(Carbon::now()->addMinutes(60));

                $credentials = $request->validate([
                    'username' => 'required',
                    'password' => 'required',
                ]);

                if (Auth::attempt($credentials)){
                    $user = Auth::user();
                    $token = $user->createToken($request->get('username'))->accessToken;

                    return response()->json([
                        "name" => $user['username'],
                        "token" => $token,
                        "id" => $user['id'],
                        "active" => $user["activo"]
                    ], Response::HTTP_OK);
                } else {
                    return response()->json([
                        "error" => 'Error de autenticación'
                    ], Response::HTTP_INTERNAL_SERVER_ERROR);
                }

            } else {
                return response()->json([
                    "error" => 'Contraseña incorrecta'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

        } catch (Throwable $throwable) {
            return response()->json([
                "title" => 'Error interno del sistema',
                "error" => $throwable->getMessage(),
                "linea" => $throwable->getLine()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
