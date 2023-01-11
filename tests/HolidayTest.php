<?php

namespace App;

use DateTime;
use PHPUnit\Framework\TestCase;

class HolidayTest extends TestCase
{
    private $holiday;

    public function setUp()
    {
        $this->holiday = new FakeHoliday();
    }

    public function test_today_is_not_xmas()
    {
        $this->givenDate('11', '25');
        $this->sayHelloShouldBe('Today is not Xmas');
    }

    public function test_today_is_xmas()
    {
        $this->givenDate('12', '25');
        $this->sayHelloShouldBe('Merry Xmas');
    }

    /**
     * @param $month
     * @param $day
     *
     * @return void
     */
    protected function givenDate($month, $day): void
    {
        $datetime = new DateTime();
        $datetime->setDate('2000', $month, $day);
        $this->holiday->setDateTime($datetime);
    }

    /**
     * @param $expected
     *
     * @return void
     */
    protected function sayHelloShouldBe($expected): void
    {
        $this->assertTrue($expected === $this->holiday->sayHello());
    }
}

class FakeHoliday extends Holiday
{
    private $dateTime;

    /**
     * @param mixed $dateTime
     *
     * @return FakeHoliday
     */
    public function setDateTime($dateTime): FakeHoliday
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    protected function getDateTime(): DateTime
    {
        return $this->dateTime;
    }
}
