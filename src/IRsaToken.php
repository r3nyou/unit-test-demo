<?php

namespace App;

interface IRsaToken
{
    public function getRandom($account);
}
