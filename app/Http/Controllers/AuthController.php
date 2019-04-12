<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 'admin';
        $credentials = $user->only('email', 'password', 'role');
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
            $user = [
             'id' => auth()->user()->id,
             'name' => auth()->user()->name,
             'avatar' => auth()->user()->avatar,
             'role' => auth()->user()->role
           ];
            User::where('id', $user['id'])->update(['token' => $token]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        $status = 'success';
        return response()->json(compact('status', 'user'));
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
        $user = User::where(['token' => $data['token'], 'id' => $data['id'], 'role' => $data['role']])->first();
        if ($user) {
            return 'sim';
        }
        return 'nao';
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['role'] = 'usuario';
        $data['password'] = Hash::make($request->password);

        if (User::create($data)) {
            return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }
}
