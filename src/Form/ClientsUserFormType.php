<?php

namespace App\Form;

use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsUserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenomClient', TextType::class, ['label' => 'Prénom'])
            ->add('nomClient', TextType::class, ['label' => 'Nom'])
            ->add('email', EmailType::class, ['label' => 'E-mail'])
            ->add('telephoneClient', TextType::class, ['label' => 'Téléphone'])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],
                'invalid_message' => ['Mot de passe doivent être identiques.'],
            ])

            ->add('selectedOffre', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Rando' => 4,
                    'Activité' => 5,
                    'Xtreme' => 6
                ]
            ])

            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'button'],
            ]);
    }



    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clients::class,
        ]);
    }
}
