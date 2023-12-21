<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show(Request $request){
        $user = User::find($request->is_admin==0);
            return response()->json($user);
    }
    public function showAdmin(Request $request){
        $user = User::find($request->is_admin);
        return response()->json($user);
    }
//create method
    public function RegisterUser(Request $request){
        
        $validator = Validator::make($request->all(),[
            'name'=>'required | max:255',
            'email'=>'required | email | unique:users,email',
            'password'=>'required | min:8 | string',
            'is_admin'=>'boolean',
        ]);
        if(User::find($request->is_admin==1)){
            return response()->json(['message'=>'Admin already exists']);
        }else{
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()],400);
            }else{
                $user = new User;
                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=bcrypt($request->password);
                $user->is_admin=$request->is_admin;
    
                $user->save();
                return response()->json(['message'=>'User has been registered successfully']);
            }
        }
        
        
    }
    public function UpdateUser(Request $request){
        $user = User::findOrFail($request->email);
        if(!$user){
            return response()->json(['message'=>'user is not found'],404);
        }else{
            $validator = Validator::make($request->all(),[
                'name'=>'required | max:255',
                'email'=>'required | email | unique:users,email',
                'password'=>'required | min:8 | string',
            ]);
    
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()],400);
            }else{

                $user->name=$request->name;
                $user->email=$request->email;
                $user->password=bcrypt($request->password);
                $user->is_admin=$request->is_admin;
    
                $user->update();
                return response()->json(['message'=>'User has been updated successfully']);
            }

        }
        
    }

    public function destroy(Request $request){
        $user = user::findOrFail($request->email);
        return response()->json(['message'=>'This user has been deleted successfully']);
    }
}
