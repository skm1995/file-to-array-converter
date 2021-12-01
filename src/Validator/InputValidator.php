<?php

namespace App\Validator;

use App\Exception\InvalidInputException;

class InputValidator
{
    /**
     * @param mixed $input
     * @throws InvalidInputException
     */
    public function validate($input)
    {
        if (empty($input)) {
            throw new InvalidInputException("Empty input.");
        }
    }
}
