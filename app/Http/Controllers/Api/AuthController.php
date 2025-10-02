<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\RefreshToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    private function generateTokens(User $user)
    {
        // Access Token
        $accessToken = $user->createToken('API Token')->plainTextToken;

        // Refresh Token
        $refreshToken = Str::random(60);
        $expiresAt    = Carbon::now()->addDays(7); // refresh token 7 days valid

        RefreshToken::create([
            'user_id'    => $user->id,
            'token'      => $refreshToken,
            'expires_at' => $expiresAt,
        ]);

        return [
            'access_token'  => $accessToken,
            'refresh_token' => $refreshToken,
            'expires_in'    => $expiresAt->toDateTimeString(),
        ];
    }

    public function register(RegisterRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();

        $user = User::create([
            'full_name' => $data['full_name'],
            'email'     => $data['email'],
            'password'  => $data['password'],
        ]);

        $tokens = $this->generateTokens($user);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data'    => [
                'user'          => $user,
                'access_token'  => $tokens['access_token'],
                'refresh_token' => $tokens['refresh_token'],
                'expires_in'    => $tokens['expires_in'],
            ],
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user   = Auth::user();
        $tokens = $this->generateTokens($user);

        return response()->json([
            'success' => true,
            'message' => 'User logged in successfully',
            'data'    => [
                'user'          => $user,
                'access_token'  => $tokens['access_token'],
                'refresh_token' => $tokens['refresh_token'],
                'expires_in'    => $tokens['expires_in'],
            ],
        ], 200);
    }

    public function refresh(Request $request)
    {
        $request->validate([
            'refresh_token' => 'required|string',
        ]);

        $refresh = RefreshToken::where('token', $request->refresh_token)->first();

        if (! $refresh || $refresh->expires_at->isPast()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired refresh token',
            ], 401);
        }

        $user = $refresh->user;
        $refresh->delete();

        $tokens = $this->generateTokens($user);

        return response()->json([
            'success' => true,
            'message' => 'Access token refreshed successfully',
            'data'    => [
                'access_token'  => $tokens['access_token'],
                'refresh_token' => $tokens['refresh_token'],
                'expires_in'    => $tokens['expires_in'],
            ],
        ], 200);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully',
        ], 200);
    }
}
