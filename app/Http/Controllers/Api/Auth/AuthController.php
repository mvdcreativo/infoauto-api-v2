<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    ///REGISTRO
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'state_id' => 'required|int',
            'city_id' => 'required|int',
        ]);
        $name = $request->name;
        $user = new User([
            'name'     => $name,
            'slug'     => str_slug($name),
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'neighborhood_id' => $request->neighborhood_id
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }

    //LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            // 'remember_me' => 'boolean',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        //
            $remember_me = true;
        //
        if ($remember_me) {
            $token->expires_at = Carbon::now()->add(1,'minute');
        }
        $token->save();
        // dd($tokenResult);

        return response()->json([
            'token' => $tokenResult->accessToken,
            // 'refresh_token' => $tokenResult->refreshToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                    ->toDateTimeString(),
            'user' => $user
        ]);
    }

    //LOGOUT
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 
            'Successfully logged out']);
    }

    //USUARIO
    public function user(Request $request)
    {
        return response()->json($request->user());
        // return User::all();
    }
}
