<?php
/**
 * Created by PhpStorm.
 * User: Bekzod
 * Date: 05.03.2019
 * Time: 15:12
 */

namespace App\Services\FormValidators;


use App\Services\FormValidators\Interfaces\ValidatorInterface;
use App\Services\FormValidators\Validators\CustomValidator;
use App\Services\FormValidators\Validators\EmailValidator;
use App\Services\FormValidators\Validators\NumberValidator;
use App\Services\FormValidators\Validators\PhoneValidator;
use Telegram\Bot\Objects\BaseObject;

class Validator
{

    protected static $typeValidators = [
        'num' => NumberValidator::class,
        'tel' => PhoneValidator::class,
        'email' => EmailValidator::class,
        'text' => 'text' //Default question type which is not validated
    ];

    public static function handleTypeValidator(BaseObject $message, $name)
    {
        $validator  = self::getTypeValidator($name);
        return (new $validator)->handle($message);
    }

    protected static function getTypeValidator($name)
    {
        return self::$typeValidators[$name];
    }

    public static function getTypeValidators()
    {
        return self::$typeValidators;
    }

    public static function handleCustomValidator(BaseObject $message, $value)
    {
        return (new CustomValidator())->handle($message, $value);
    }

}