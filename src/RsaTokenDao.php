<?php

namespace App;

class RsaTokenDao
{
    public function getRandom($account)
    {
        return sprintf('%06d', mt_rand(0, 999999));
    }
}
