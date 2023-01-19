<?php

namespace App\Form;

use App\Entity\SouscriptionClientOffre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SousriptionClientOffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('finSouscription')
            ->add('DebutSouscription')
            ->add('offres')
            ->add('clients')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SouscriptionClientOffre::class,
        ]);
    }
}
