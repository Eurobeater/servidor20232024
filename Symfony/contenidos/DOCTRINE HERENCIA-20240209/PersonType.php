<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Entity\Person;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder->add('nombre');
        $builder->add('apellidos');
		$builder->add('nif');
    }
	public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Person::class
        ));
    }
    public function getName()
    {
        return 'person';
    }
}