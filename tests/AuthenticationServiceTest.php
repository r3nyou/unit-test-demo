<?php

namespace App;

use PHPUnit\Framework\TestCase;

class AuthenticationServiceTest extends TestCase
{
    private $target;
    private $stubProfile;
    private $stubToken;

    public function setUp()
    {
        $this->stubProfile = $this->getMockBuilder(IProfile::class)->getMock();
        $this->stubToken = $this->getMockBuilder(IRsaToken::class)->getMock();
        $this->target = new AuthenticationService($this->stubProfile, $this->stubToken);
    }

    public function test_is_valid()
    {
        $this->givenProfile('marcus', '91');
        $this->givenToken('000000');

        $this->shouldBeValid('marcus', '91000000');
    }

    /**
     * @param $account
     * @param $password
     *
     * @return void
     */
    protected function givenProfile($account, $password): void
    {
        $this->stubProfile->method('getPassword')
            ->with($account)
            ->willReturn($password);
    }

    /**
     * @param $randomCode
     *
     * @return void
     */
    protected function givenToken($randomCode): void
    {
        $this->stubToken->method('getRandom')->willReturn($randomCode);
    }

    /**
     * @param $account
     * @param $password
     *
     * @return void
     */
    protected function shouldBeValid($account, $password): void
    {
        $this->assertTrue($this->target->isValid($account, $password));
    }
}
