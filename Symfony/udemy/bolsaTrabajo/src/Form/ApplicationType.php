<?php

namespace App\Form;

use App\Entity\Applicant;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;                                                          //importar la clase SubmitType para enviar los datos (documentación de Symfony)
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void                                   //construye el formulario
    {
        $builder                                                                                                    //un elemento por cada una de las propiedades de la entidad
            ->add('name')
            ->add('email')
            ->add('datebirth', DateType::class, [                                                                   //no está en el curso. para permitir años anteriores a 2019 (por defecto en symfony) he añadido la clase DateType (o BirthdayType) y su respectiva propiedad 'years' para ampliar el rango de años
                'years' => range(1900, date('Y')),                                                                  // Permitir años desde 1900 hasta el año actual
            ])
            ->add('save', SubmitType::class);                                                                       //boton de enviar formulario. importar la clase SubmitType para enviar los datos
            //->add('jobOffers', EntityType::class, [                                                               //en el curso daba error éste campo porque la clase JobOffer no puede ser convertida a string. se procede a comentar esa propiedad
                //'class' => JobOffer::class,
//'choice_label' => 'id',
//'multiple' => true,
            //])
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Applicant::class,                                                                   //la entidad a tener en cuenta, Applicant
        ]);
    }
}
