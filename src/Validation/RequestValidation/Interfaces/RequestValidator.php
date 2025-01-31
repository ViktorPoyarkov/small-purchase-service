<?php

namespace App\Validation\RequestValidation\Interfaces;
use App\DTO\Interfaces\ICommonDTO;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface RequestValidator
{
    public function __construct(ValidatorInterface $validator);
    public function validate(mixed $value, Constraint|array|null $constraints = null, string|GroupSequence|array|null $groups = null): void;
}