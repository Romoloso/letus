<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();

        return response()->json(['msg' => 'Successfully created!'], 201);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = request(['email', 'password']);
        if (! \Auth::attempt($credentials)) {
            // 错误次数加 1.
            $this->incrementLoginAttempts($request);

            /**
             * 剩余的登录次数
             * maxAttempts 最大登录次数
             * limiter     Illuminate\Cache\RateLimiter;
             * attempts    登录错误次数
             * throttleKey $request 的 key
             */
            $remaining_attempts = $this->maxAttempts() - $this->limiter()->attempts($this->throttleKey($request));

            return response()->json(['msg' => "您还有{$remaining_attempts}次登录机会"], 401);
        }

        $user = $request->user();

        // 清除登录错误次数
        $this->clearLoginAttempts($request);

        $tokenResult = $user->createToken('Person Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1)->toDateTimeString();
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ], 200);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

}
