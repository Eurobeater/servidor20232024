<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use UnexpectedValueException;

class TelefonoValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var Telefono $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        // TODO: implement the validation here

        if (!is_string($value)) {
            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
            throw new UnexpectedValueException($value, 'string');

            // separate multiple types using pipes
            // throw new UnexpectedValueException($value, 'string|int');
        }

        // TODO: implement the validation here
        if (!preg_match('((6|7)[0-9]{8})' , $value, $matches) || strlen( $value ) > 9 ) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
