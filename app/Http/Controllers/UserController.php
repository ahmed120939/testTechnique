<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    // public function create(Request $request)
    // {
    //     $user = new User();
        
    //     $user->name = $request->name;
    //     $user->password = Hash::make($request->password);
    //     $user->email = $request->email;
    //     $user->save();
    //     return response([
    //         "message" => "User ajoute avec succes"
    //     ],200); 

    // }


    public function registre(Request $request)
    {
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

       $user=User::create([
        'name'=>$fields['name'],
        'email'=>$fields['email'],
        'password'=>bcrypt($fields['password'])
       ]);
       $token=$user->createToken('myapptoken')->plainTextToken;
        
       $response=[
           'user' => $user,
           'token'=>$token
       ];
       return response($response,201);
    }

    public function showAll()
    {
        return User::all();

    }
    public function show(int $id)
    {
        return User::find($id);

    }
    
    public function delete(int $id)
    {
        $user = User::find($id);
        if ($user == null){
            return response([
                "message" => "l'utilisateur  non trouver"
            ],404);
        }

        User::destroy($id);
        return response([
            "message" => "supprition avec succes"
        ],200); 

    }
    public function logout(Request $request)
    {
       auth()->user()->tokens()->delete();
       
        return [
            "message" => "Logged out"
        ];

    }
public function login(Request $request)
    {
        $fields=$request->validate([
          
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

         // check email
             $user= User::where('email',$fields['email'])->first();
         // check password
         if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'message'=>'Erreur Authentification'
            ],401);
         }

       $token=$user->createToken('myapptoken')->plainTextToken;
        
       $response=[
           'user' => $user,
           'token'=>$token
       ];
       return response($response,201);
    }
    

}
