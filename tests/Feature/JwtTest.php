<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Providers\Auth\Illuminate;
use Tymon\JWTAuth\Token;

class JwtTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $admin = User::whereId(1)->first();
        $token = Auth::guard('api')->login($admin, true);
        $token = new Token($token);
        $JWTAuth2 = new \Tymon\JWTAuth\JWTAuth(JWTAuth::manager(), new Illuminate(Auth::guard('admin')), JWTAuth::parser());
        dd($JWTAuth2->setToken($token)->authenticate());
    }
}
