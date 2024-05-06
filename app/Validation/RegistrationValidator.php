<?php

namespace app\Validation;

enum RegistrationValidator: string {
    case EMAIL = "email";
    case PASSWORD = "password";
}