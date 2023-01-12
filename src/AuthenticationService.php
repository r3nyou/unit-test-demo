<?php

namespace App;

class AuthenticationService
{
    /**
     * @param $account
     * @param $password
     *
     * @return bool
     */
    public function isValid($account, $password)
    {
        $profile = new ProfileDao();
        $passwordFromDao = $profile->getPassword($account);

        $token = new RsaTokenDao();
        $randomCode = $token->getRandom($account);

        $validPassword = $passwordFromDao . $randomCode;
        $isValid = $password === $validPassword;

        if ($isValid) {
            return true;
        }

        return false;
    }
}
