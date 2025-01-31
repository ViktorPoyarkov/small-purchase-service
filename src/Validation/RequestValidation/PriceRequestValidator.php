<?php

namespace App\Validation\RequestValidation;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\GroupSequence;

class PriceRequestValidator extends AbstractRequestValidator
{
    public function validate(mixed $value, array|Constraint|null $constraints = null, array|GroupSequence|string|null $groups = null): void
    {
        parent::validate($value, null, ['First']);
        parent::validate($value, null, ['Second']);
    }
}
