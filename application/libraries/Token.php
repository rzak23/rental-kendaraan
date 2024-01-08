<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;

class Token{

    public function cek_token($token): bool
    {
        if(isset($token)){
            $key = getenv('APP_KEY');
            try{
                JWT::$leeway = 60 * 60;
                $decode = JWT::decode($token, new Key($key, 'HS256'));

                auth()->set_auth($decode->accId);
                return true;
            }catch(SignatureInvalidException $e){
                return false;
            }
        }else{
            return false;
        }
    }

}