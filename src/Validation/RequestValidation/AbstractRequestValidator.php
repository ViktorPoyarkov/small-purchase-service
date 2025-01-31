<?php

namespace App\Validation\RequestValidation;

use App\Validation\RequestValidation\Interfaces\RequestValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Exception\ValidatorException;

abstract class AbstractRequestValidator implements RequestValidator
{
    public function __construct(private ValidatorInterface $validator)
    {
    }

    public function validate(mixed $value, Constraint|array|null $constraints = null, string|GroupSequence|array|null $groups = null): void
    {
        $errors = $this->validator->validate($value, $constraints, $groups);

        if (count($errors) > 0) {
            throw new ValidatorException((string) $errors);
        }
    }
}