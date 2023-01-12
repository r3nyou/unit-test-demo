<?php

namespace App;

use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    public function test_is_valid()
    {
        $stubProfile = $this->getMockBuilder(IProfile::class)->getMock();
        $stubProfile->method('getPassword')->willReturn('91');
        $stubToken = $this->getMockBuilder(IRsaToken::class)->getMock();
        $stubToken->method('getRandom')->willReturn('000000');

        $target = new AuthenticationService($stubProfile, $stubToken);
        $actual = $target->isValid('marcus', '91000000');
        $this->assertTrue($actual);
    }
}
