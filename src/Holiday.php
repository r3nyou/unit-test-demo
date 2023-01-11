<?php

namespace App;

use DateTime;

class Holiday
{
    public function sayHello(): string
    {
        $date = new DateTime();
        if ('12' === $date->format('m') && '25' === $date->format('d')) {
            return 'Merry Xmas';
        }

        return 'Today is not Xmas';
    }
}
