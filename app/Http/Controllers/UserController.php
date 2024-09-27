<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Adress;
use Illuminate\Http\Request;
use App\Http\Requests\userValidate;
use App\Http\Requests\loginRequest;
use App\Http\Middleware\loginMiddleware;
use Laravel\Sanctum\HasApiToken;

use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function registeration(userValidate $request){
        $request = $request->validated();
        // $user= new User();
        // $user->name = $request['name'];
        // $user->email = $request['email'];
        // $user->age = $request['age'];
        // $user->position = $request['position'];
        // $user->password = $request['password'];

        $user=User::create($request);
        $token=$user->createToken($user->name);

        // $user->save();
        return redirect()->route('login');
        // return [
        //     'user'=>$user,
        //     'token'=>$token->plainTextToken,
        // ];
    }
    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials do not match our records.'],

            ]);
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('MyAppToken')->plainTextToken;
        // return redirect()->route('dashboard');

        return response()->json([
            'access_token' => $token,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
    // public function login(loginRequest $request){
    //     // $request = $request->validated();
    //     $request=$request->validate([
    //         'email'=>'required|email',
    //         'password'=>'required'
    //     ]);

    //     if(Auth::attempt($request)){
    //         $user= User::where('email',$request->email)->first();
    //         $token=$user->createToken($request->name);
    //         return redirect()->route('dashboard');
    //     }
    //     // $user= User::where('email',$request->email)->first();
    //     // $token=$user->createToken($request->name);
    // }
    public function dashboardPage(){
        if(Auth::check()){
            return view('dashboard');
        }else{
            return redirect()->route(login);
        }
        return view('dashboard');
    }
    // public function logout(Request $request){
    //     $request->user()->tokens()->delete();
    //     // $data=(['message'=>'you are loged out!!']);
    //     return redirect()->route('login');
    // }

}
