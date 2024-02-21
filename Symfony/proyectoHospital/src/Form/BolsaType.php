<?php

namespace App\Form;

use App\Entity\Bolsa;
use App\Entity\Puesto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BolsaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('telefono')
            ->add('email')
            ->add('cp')
            ->add('puesto', EntityType::class, [
                'class' => Puesto::class,
'choice_label' => 'nombre',                                                                     //aqui antes estaba la propiedad 'id'. la he cambiado por 'nombre' para que el usuario vea en el desplegable los nombres de los puestos de trabajo, y no los números de las ids
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bolsa::class,
        ]);
    }
}
