<?php

namespace App;

use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    public function test_is_valid()
    {
        $target = new AuthenticationService(new FakeProfile(), new FakeToken());
        $actual = $target->isValid('marcus', '91000000');
        $this->assertTrue($actual);
    }
}

class FakeProfile implements IProfile
{

    public function getPassword($account)
    {
        if ('marcus' === $account) {
            return '91';
        }
        return '';
    }
}

class FakeToken implements IRsaToken
{

    public function getRandom($account)
    {
        return '000000';
    }
}
