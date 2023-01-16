<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientPremiereInscriptionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenomClient', TextType::class, ['label' => 'Prénom'])
            ->add('nomClient', TextType::class, ['label' => 'Nom'])
            ->add('mailClient', EmailType::class, ['label' => 'E-mail'])
            ->add('motDePasseClient', PasswordType::class, ['label' => 'Mot de passe'])
            ->add('motDePasseClient', PasswordType::class, ['label' => 'Mot de passe'])
            ->add('adresse', CollectionType::class, [
                'entry_type' => AdresseFormType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
            ])
            ->add('S\'inscrire', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
