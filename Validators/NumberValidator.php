<?php

namespace App\Services\FormValidators\Validators;

use App\Services\FormValidators\Exceptions\FormValidationException;
use App\Services\FormValidators\Interfaces\ValidatorInterface;
use Telegram\Bot\Objects\BaseObject;

class NumberValidator extends ValidatorInterface
{
    public function handle(BaseObject $message, $value = null)
    {
        $value = $message->get('text');
        if(!is_numeric($value)){
            throw new FormValidationException(__('client.number_error', ['answer'=>$value]));
        }
        return $value;
    }
}