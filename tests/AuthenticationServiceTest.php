<?php

namespace App;

use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    public function test_is_valid()
    {
        $target = new AuthenticationService();
        $actual = $target->isValid('marcus', '91000000');
        $this->assertTrue($actual);
    }
}

