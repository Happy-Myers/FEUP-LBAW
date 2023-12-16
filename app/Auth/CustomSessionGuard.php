<?php

use Illuminate\Auth\SessionGuard;

class CustomSessionGuard extends SessionGuard{
    public function attempt(array $credentials = [], $remember = false){
        $attempt = parent::attempt($credentials, $remember);

        if($attempt){
            $user = $this->user();
            if($user && $user->banned){
                $this->logout();
                return false;
            }
        }

        return $attempt;
    }
}