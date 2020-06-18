<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(SignupRequest $request)
    {
        try {
            $data = $request->except(['password', 'confirm_password']);
            $data['password'] = Hash::make($request->password);

            DB::beginTransaction();
            $user = User::create($data);

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            $returnData = [
                'user_data' => [
                    'name' => $user->name,
                    'email' => $user->email
                ],
                'access_token' => [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]
            ];
            DB::commit();

            return success_response(JsonResponse::HTTP_CREATED, 'Registration Completed', $returnData);
        }
        catch (Exception $error)
        {
            error_response(JsonResponse::HTTP_UNPROCESSABLE_ENTITY, 'Something went wrong', $error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function signin(SigninRequest $request)
    {
        try {
            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return error_response(JsonResponse::HTTP_UNAUTHORIZED, 'Not authorized', null);
            }
            $user = User::all()->where('email', $request->email)->first();
            if ( ! Hash::check($request->password, $user->password, [])) {
                return error_response(JsonResponse::HTTP_UNAUTHORIZED, 'Login Error', null);
            }
            $tokenResult = $user->createToken('authToken')->plainTextToken;

            $returnData = [
                'user_data' => [
                    'name' => $user->name,
                    'email' => $user->email
                ],
                'access_token' => [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]
            ];

            return success_response(JsonResponse::HTTP_OK, 'Successfully logedin', $returnData);

        } catch (Exception $error) {
            return error_response(JsonResponse::HTTP_UNAUTHORIZED, 'Something went wrong', $error);
        }
    }


}
