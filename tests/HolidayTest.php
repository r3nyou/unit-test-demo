<?php

namespace App;

use DateTime;
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
        $holiday = new FakeHoliday();
        $this->assertTrue('Merry Xmas' === $holiday->sayHello());
    }
}

class FakeHoliday extends Holiday
{
    protected function getDateTime(): DateTime
    {
        return new DateTime('2000-12-25');
    }
}
