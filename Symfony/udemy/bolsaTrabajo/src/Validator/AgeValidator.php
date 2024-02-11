<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AgeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)                        //la función validate() recibe un constraint y un valor. el valor es el valor de la propiedad que va a ser validada. $constraint es una instancia de la clase Age.php
    {
        /** @var Age $constraint */

        if (null === $value || '' === $value) {                                     //valida que el valor no sea vacío
            return;
        }

        // TODO: implement the validation here                                      //las validaciones se ponen aquí. vamos a validar que el aplicante no sea menor de edad
        $today = new \DateTimeImmutable();                                          //se guarda en una variable $today la fecha de hoy
        $diff = $today->diff($value);                                               //guardar en la variable $diff la diferencia entre la fecha de hoy ($today) y la fecha introducida en el formulario ($value) con la función diff(). en la siguiente línea usaremos la propiedad 'y' para saber la diferencia de años con el input

        if ($diff->y < 18) {                                                        //la fecha es del objeto DateInterval. 'y' es la propiedad de dicho objeto (año). si la diferencia medida en años (y) es menor que 18, se crea una violación
            $this->context->buildViolation($constraint->message)                    //se establece el parámetro {{value}}, y su valor es $value.
            ->setParameter('{{ value }}', $value->format('m-d-Y'))                  //debe contener siempre un string, como es una fecha se debe convertir a string con la función format() con mes dia año (formato americano)
            ->addViolation();                                                       //para aplicar el validador, tenemos que aplicarlo en la clase Applicant.php 
        }
    }
}
