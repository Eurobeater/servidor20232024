<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 *
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class Age extends Constraint
{
                                                                                                                //esto es el constraint. es decir, la regla específica
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = 'The value "{{ value }}" means you are under age.';                                       //mensaje a mostrar en caso de que la regla falle. {{ value }} viene de la variable $value de AgeValidator.php
}
