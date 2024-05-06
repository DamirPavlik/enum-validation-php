<?php

namespace app\Validation;

class BaseValidator
{
    public static function validate(array $request, $validator)
    {
        if (count($validator::cases()) !== count($request)) {
            throw new \Exception(message: "Parameters do not match");
        }

        foreach ($request as $key => $value) {
            if ($validator::tryFrom($key) === null) {
                throw new \Exception(message: "Parameter not found");
            }

            if ($validator::tryFrom($key) === $validator::EMAIL) {
                if (!self::validateEmail($value)) {
                    throw new \Exception(message: "Invalid email format");
                }
            }
        }
    }

    private static function validateEmail(string $email): int | false
    {
        $emailRegex = '/^\S+@\S+\.\S+$/';
        return preg_match($emailRegex, $email);
    }
}