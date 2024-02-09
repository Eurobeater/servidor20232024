<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\PersonType;
use App\Entity\Student;

class TeacherType extends PersonType
{
    public function buildForm(FormBuilderInterface $builder, array $options  )
    {
        parent::buildForm( $builder, $options ); 
        $builder->add('especialidad');
		$builder->add('save', SubmitType::class );
    }

    public function getName()
    {
        return 'teacher';
    }
}