<?php

namespace App;

use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase
{
    public function test_today_is_not_xmas()
    {
        $holiday = new Holiday();
        $this->assertTrue('Today is not Xmas' === $holiday->sayHello());
    }

    public function test_today_is_xmas()
    {
        $holiday = new Holiday();
        $this->assertTrue('Merry Xmas' === $holiday->sayHello());
    }
}
