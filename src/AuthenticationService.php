<?php

namespace App;

class AuthenticationService
{
    /**
     * @var IProfile
     */
    private $profile;

    /**
     * @var IRsaToken
     */
    private $token;

    public function __construct(IProfile $profile = null, IRsaToken $token = null)
    {
        $this->profile = $profile ?: new ProfileDao();
        $this->token = $token ?: new RsaTokenDao();
    }

    /**
     * @param $account
     * @param $password
     *
     * @return bool
     */
    public function isValid($account, $password)
    {
        $passwordFromDao = $this->profile->getPassword($account);

        $randomCode = $this->token->getRandom($account);

        $validPassword = $passwordFromDao . $randomCode;
        $isValid = $password === $validPassword;

        if ($isValid) {
            return true;
        }

        return false;
    }
}
