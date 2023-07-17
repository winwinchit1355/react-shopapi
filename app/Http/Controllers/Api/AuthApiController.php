<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Responses\ResponseFormat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\RefreshTokenRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthApiController extends Controller
{
    use ResponseFormat , AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->apiValidationErrorResponse($request->all(),'Validation Fail!',$validator->errors());
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->uuid = Str::uuid()->toString();
        $customer->password = bcrypt($request->password);
        $customer->save();
        return  $this->apiSuccessResponse($customer,'Successfully',200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->apiValidationErrorResponse($request->all(),'Validation Fail!',$validator->errors());
        }

        if (!auth()->guard('customer')->attempt($credentials)) {
            return $this->apiErrorResponse($request->all(),'Unauthorized!',$validator->errors());
        }

        /* ------------ Create a new personal access token for the user. ------------ */
        $tokenData = auth()->guard('customer')->user()->createToken('MyApiToken');
        $token = $tokenData->accessToken;
        $expiration = $tokenData->token->expires_at->diffInSeconds(Carbon::now());

        return response()->json([
            'message'=>'Successfully Login.',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => $expiration
        ]);
    }
    public function logout()
    {
        $customer = Auth::guard('customer_api')->user();

        if ($customer) {
            $customer->token()->revoke();
            $customer->token()->delete();
            return response()->json(['message' => 'Logged out successfully']);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        // $token = auth()->guard('customer')->user()->token();

        // /* --------------------------- revoke access token -------------------------- */
        // $token->revoke();
        // $token->delete();

        // /* -------------------------- revoke refresh token -------------------------- */
        // $refreshTokenRepository = app(RefreshTokenRepository::class);
        // $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($token->id);

        // return response()->json(['message' => 'Logged out successfully']);
    }
    public function getUser()
    {
        return response()->json(Auth::guard('customer_api')->user());
    }
}
