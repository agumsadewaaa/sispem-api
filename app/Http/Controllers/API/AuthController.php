<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Peminjam;

class AuthController extends Controller
{
    private $response = [
        'message' => null,
        'data' => null
    ];

    public function login(Request $req)
    {
        $req->validate([
            'nip_nim' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('nip_nim', $req->nip_nim)->first();

        if(!$user || ! Hash::check($req->password, $user->password)) {
            return response()->json([
                'message' => "failed"
            ]);
        }

        $token = $user->createToken($req->device_name)->plainTextToken;
        $this->response['message'] = "success";
        $this->response['data'] = [
            'token' => $token
        ];

        return response()->json($this->response, 200);
    }

    public function me()
    {
        $user = Auth::user()
        ->join('peminjams','peminjams.user_id','=','users.id')
        ->select('users.*', 'peminjams.id as peminjam_id')->first();

        $this->response['message'] = "success";
        $this->response['data'] = $user;

        return response()->json($this->response, 200);
    }

    public function logout()
    {
        $logout = auth()->user()->currentAccessToken()->delete();

        $this->response['message'] = "success";

        return response()->json($this->response, 200);
    }
}