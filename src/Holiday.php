<?php

namespace App;

use DateTime;

class Holiday
{
    public function sayHello(): string
    {
        $date = $this->getDateTime();
        if ('12' === $date->format('m') && '25' === $date->format('d')) {
            return 'Merry Xmas';
        }

        return 'Today is not Xmas';
    }

    /**
     * @return DateTime
     */
    protected function getDateTime(): DateTime
    {
        $date = new DateTime();
        return $date;
    }
}
