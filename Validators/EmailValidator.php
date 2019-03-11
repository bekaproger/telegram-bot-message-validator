<?php

namespace App\Services\FormValidators\Validators;

use App\Services\FormValidators\Exceptions\FormValidationException;
use App\Services\FormValidators\Interfaces\ValidatorInterface;
use Telegram\Bot\Objects\BaseObject;

class EmailValidator extends ValidatorInterface
{
    public function handle(BaseObject $message, $value = null)
    {
        $value = $message->get('text');
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            throw new FormValidationException(__('client.email_error', ['answer'=>$value]));
        }
        return $value;
    }
}