<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\ApiCallLog;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ResponseTrait;

/**
 * @OA\SecurityScheme(
 *   securityScheme="bearerAuth",
 *   type="http",
 *   scheme="bearer",
 *   bearerFormat= "JWT"
 *  )
 *
 */

class AuthController extends Controller
{
    use ResponseTrait;

    /**
     *  @OA\Post(
     *      path="/api/v1/login",
     *      tags={"Login"},
     *      summary="Login with email address",
     *      operationId="Login with email address",
     *      @OA\Parameter(
     *          name="email",
     *          required=true,
     *          in="query",
     *          example="developer_test@mailinator.com",
     *          description="Enter Your Email",
     *          @OA\Schema(
     *          type="string",
     *         ),
     *       ),
     *    @OA\Parameter(
     *          name="password",
     *          required=true,
     *          in="query",
     *          example="user@123",
     *          description="Enter Your Password",
     *          @OA\Schema(
     *          type="string",
     *         ),
     *       ),
     *    @OA\Response(
     *         response=200,
     *         description="json schema",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Invalid Request"
     *     ),
     * )
     */

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->sendResponse(400, $message);
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $credentials = request(['email', 'password']);
                try {
                    // attempt to verify the credentials and create a token for the user
                    if (!$token = JWTAuth::attempt($credentials)) {
                        return response()->json(['error' => 'Unauthorized'], 401);
                    }
                } catch (JWTException $e) {
                    $this->response->errorInternal('could_not_create_token');
                }
                $userData['token'] = $token;
                $userData['token_type'] = 'bearer';
                $userData['expires_in'] = JWTAuth::factory()->getTTL() * 60;
                return $this->sendResponse(200, 'Token create successfully!', $userData);
            } else {
                return $this->sendResponse(400, 'Invalid username and password.');
            }
        } else {
            return $this->sendResponse(400, 'User Not exist');
        }
    }
}
