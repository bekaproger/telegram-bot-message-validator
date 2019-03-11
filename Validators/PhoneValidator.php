<?php

namespace App\Services\FormValidators\Validators;

use App\Services\FormValidators\Exceptions\FormValidationException;
use App\Services\FormValidators\Interfaces\ValidatorInterface;
use Telegram\Bot\Objects\BaseObject;

class PhoneValidator extends ValidatorInterface
{

    protected $message;

    public function handle(BaseObject $message, $value = null)
    {
        $phone_regex = '/^(\+?\d\s)?(?(1)(\d{3}\s)|(\+?\d{3}\s\d{2}\s))(\d{7})$/';
        
        $value = $message->get('text');
        
        if($contact = $message->get('contact')){
            return $contact->get('phone_number');
        }else if(!preg_match($phone_regex, $value)){
            throw new FormValidationException(__('clinet.phone_error', ['answer'=>$value]));
        }
        
        return $value;
    }
}