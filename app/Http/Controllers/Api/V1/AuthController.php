<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Notifications\OtpNotification;
use Illuminate\Support\Facades\Validator;
use App\Notifications\WelcomeEmailNotification;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users',
                'password'  => 'required|string|min:8',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());       
            }

            $user = User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => Hash::make($request->password)
                ]);

            //$user->notify(new WelcomeEmailNotification($user));

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type'   => 'Bearer',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'     => 'required|string|email|max:255|exists:users,email',
                'password'  => 'required|string|min:8',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());       
            }

            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Password mismatch'
                ], 401);
            }

            $user->tokens()->delete();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login Sukses',
                'access_token' => $token,
                'token_type'   => 'Bearer',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function login_user(Request $request)
    {
        if(session('user_id')){
            return redirect('/task');  
        } else {
            return view("backend.login");  
        }  
    }

    public function login_user_api(Request $request)
    {
        $email = request('email');
        $password = Hash::make(request('password'));
        $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8000/api/v1/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $query = DB::select("select a.email as email, a.password as password, a.id as user_id, b.user_role_name as user_role_name, a.name as name, b.id as user_role_id from users a, user_roles b where a.user_roles_id = b.id and a.email = '$email' and a.password = '$password' limit 1");
        foreach($query as $row){
            session()->put('user_id', $row->user_id);
            session()->put('name', $row->name);
            session()->put('user_role_id', $row->user_role_id);
            session()->put('user_role_name', $row->user_role_name);
        }
        $result = json_encode($response);
        foreach($result as $row){
            session()->put('token', $row->access_token);
        }
        return $result;
    }

    public function updateProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|max:255|unique:users,email,'.$request->user()->id,
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());       
            }

            $request->user()->update($request->only('name', 'email'));

            return response()->json(new UserResource($request->user()));
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();

            return response()->json([
                'message' => 'Logged out'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
