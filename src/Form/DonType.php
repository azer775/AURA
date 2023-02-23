<?php

namespace App\Form;

use App\Entity\Don;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;



class DonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant')
            ->add('dateDon', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date',
                'attr' => ['readonly' => true],
            ])
            ->add('carteCredit')
            ->add('message')
            // ->add('Membre')
            // ->add('Association')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Don::class,
        ]);
    }
}