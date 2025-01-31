<?php

namespace App\Validation\Constraints;

use App\Services\TaxService\TaxNumberValidateService\Interfaces\ITaxNumberValidateService;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\InvalidArgumentException;

class TaxNumberConstraintValidator extends ConstraintValidator
{
    public function __construct(private ITaxNumberValidateService $taxNumberValidateService)
    {
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof TaxNumberConstraint) {
            throw new UnexpectedTypeException($constraint, TaxNumberConstraint::class);
        }

        if (!$this->taxNumberValidateService->validateTaxNumber($value)) {
            throw new InvalidArgumentException('Invalid format of Tax Number', 422);
        }

        return;
    }

}