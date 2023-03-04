<?php

namespace App\Services\UserService;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class UserService{

    public function validateInput($email, $password, $auth=false){
        $validationRule = $auth ?'exists:users':'unique:users';
        $validator = Validator::make(
        [

          'email'=>$email,
          'password'=>$password,
        ],
        [
            'email'=>['required','email:rfc, dns', $validationRule],
            'password'=>['required', 'string', Password::min(8)],

        ]);

        if($validator->fails()){
            return ['status'=>false, 'messages'=>$validator->messages()];
        }else{
            return ['status'=> true];
        }
    }

    public function register( $email, $password, $name){
         $validate = $this->validateInput($email, $password);
         if($validate['status'] == false){
            return $validate;
         }else{
            $user = User::create(['email'=>$email, 'password'=>Hash::make($password), 'name'=>$name]);
            $token = $user->createToken($name)->plainTextToken;
            return ['status'=>true, 'token'=>$token, 'user'=>$user];
         }
    }

    public function login($email, $password){
        $validate = $this->validateInput($email, $password, true);
        if($validate['status'] == false){
           return $validate;
        }else{
           $user = User::where('email', $email)->first();
           if(Hash::check($password, $user->password)){
                $token = $user->createToken($email)->plainTextToken;
                return ['status'=>true, 'token'=>$token, 'user'=>$user];
           }else{
            return ['status'=>false, 'messages'=>['password'=>'Incorrect Password'] ];
           }

        }
    }
}
