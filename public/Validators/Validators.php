<?php

namespace App\Validators;

class Validators
{

    /**
     * @param string $input
     * @return bool
     */
    public static function validateDateInput(string $input)
    {
        if ($input) {
            $exploded = explode( '/', $input);
            var_dump($exploded);
            if (count($exploded) == 3) {
                if ((is_numeric($exploded[0]) && strlen($exploded[0]) == 2) && (is_numeric($exploded[1]) && strlen($exploded[1]) == 2) && (is_numeric($exploded[2]) && strlen($exploded[2]) == 4)) {
                    return true;
                }
            }
        }
        return false;
    }
}