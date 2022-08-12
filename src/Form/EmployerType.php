<?php

namespace App\Form;

use App\Entity\Employer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EmployerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('telephone', TextType::class)
            ->add('email', TextType::class)
            ->add('adresse', TextType::class)
            ->add('poste', TextType::class)
            ->add('salaire')
            ->add('datedenaissance'
            , DateType::class, [
                'label' => "Date de naissance : ",
                'format' => 'dd MM yyyy',
                'years' => range(date('1950'), date('Y')-14),
                'widget' => 'choice',

                    'input'  => 'datetime_immutable'
            
            ]
);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employer::class,
        ]);
    }
}
