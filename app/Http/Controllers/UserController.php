<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function validateUser($request){
        $validator =  Validator::make($request->all(), [
            'numD' => 'required|',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        if($validator -> fails()){
            return response()->json([
                'validation_errors'=>$validator->errors(),
            ]);
        }
    }
    
    public function register(Request $request){
        
        $error = $this->validateUser($request);
        if($error) return response()->json($error, 400);

        $user = new User();
        $user->tipoD = $request->tipoD;
        $user->numD = $request->numD;
        $user->name = $request->name;
        $user->direccion = $request->direccion;
        $user->distrito = $request->distrito;
        $user->telefono = $request->telefono;
        $user->celular = $request->celular;
        $user->email = $request->email;

        $user->save();

        return response()->json([
            'status'=>200,
            'username'=>$user,
            'message'=>'Register successfully',
        ]);
        
    }
}
