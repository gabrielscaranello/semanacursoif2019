<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
      
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
            $user = [
             'id' => auth()->user()->id,
             'name' => auth()->user()->name,
             'avatar' => auth()->user()->avatar,
             'estudante' =>auth()->user()->estudante,
             'curso' =>auth()->user()->curso,
             'ano' =>auth()->user()->ano,
             'ra' =>auth()->user()->ra,
           ];
            User::where('id', $user['id'])->update(['token' => $token]);
            $user['token'] = $token;
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        $status = 'success';
        return response()->json(compact('token', 'user', 'status'));
    }

    public function check()
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response(['authenticated' => false]);
        }
        return response(['authenticated' => true]);
    }

    public function logout()
    {
        try {
            $token = JWTAuth::getToken();

            if ($token) {
                JWTAuth::invalidate($token);
            }
        } catch (JWTException $e) {
            return response()->json($e->getMessage(), 401);
        }
        return response()->json(['message' => 'Log out success'], 200);
    }
    public function verificaToken(Request $request)
    {
        $data = $request->all();
        $user = User::where(['token' => $data['token'], 'id' => $data['id']])->first();
        if ($user) {
            return 'sim';
        }
        return 'nao';
    }
}
