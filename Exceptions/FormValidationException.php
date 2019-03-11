<?php

namespace App\Services\FormValidators\Exceptions;


use Throwable;

class FormValidationException extends \Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}