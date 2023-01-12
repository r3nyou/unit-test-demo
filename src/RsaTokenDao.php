<?php

namespace App;

class RsaTokenDao implements IRsaToken
{
    public function getRandom($account)
    {
        return sprintf('%06d', mt_rand(0, 999999));
    }
}
