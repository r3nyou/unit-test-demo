<?php

namespace App;

class ProfileDao
{
    public function getPassword($account)
    {
        return Context::getPassword($account);
    }
}
