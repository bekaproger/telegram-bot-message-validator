<?php

namespace App\Services\FormValidators\Validators;


use App\Services\FormValidators\Exceptions\FormValidationException;
use App\Services\FormValidators\Interfaces\ValidatorInterface;
use Telegram\Bot\Objects\BaseObject;

class CustomValidator
{
    public function handle(BaseObject $message, $validator_value)
    {
        $answer = $message->get('text');
        if(mb_stripos($answer, $validator_value) === false){
            throw new FormValidationException(
            	__('client.custom_validator_error', ['answer'=>$answer, 'validator_value'=>$validator_value])
            );
        }
        return $answer;
    }
}