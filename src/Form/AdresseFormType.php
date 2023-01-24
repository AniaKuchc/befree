<?php

namespace App\Form;

use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use App\Form\ClientsUserFormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdresseFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numeroAdresse', IntegerType::class, ['label' => 'N° Rue :'])
            ->add('rueAdresse', TextType::class, ['label' => 'Rue :'])
            ->add('codePostalAdresse', IntegerType::class, ['label' => 'CP', 'attr' => ['min' => 5]])
            ->add('villeAdresse', TextType::class, ['label' => 'Ville']);

        $builder
            ->add('clients', CollectionType::class, [
                'label' => false,
                'entry_type' => ClientsUserFormType::class,
                'entry_options' => ['label' => false],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
