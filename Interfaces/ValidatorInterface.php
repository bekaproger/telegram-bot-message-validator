<?php

namespace  App\Services\FormValidators\Interfaces;

use Telegram\Bot\Objects\BaseObject;

abstract class ValidatorInterface
{
    abstract public function handle(BaseObject $message, $value = null);
}