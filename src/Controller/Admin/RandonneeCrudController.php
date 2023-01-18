<?php

namespace App\Controller\Admin;

use App\Entity\Randonnee;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class RandonneeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Randonnee::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomRandonnee', 'Nom'),
            TextField::new('villeRandonnee', 'Ville'),
            ChoiceField::new('typeRandonnee', 'Type')->setChoices(['choices' => ['Multi-activités' => 'Multi-activités', 'VTT' => 'VTT', 'Randonnée pédestre' => 'Randonnée pédestre',]]),
            TextField::new('geometryRandonnee', 'Geometry'),
            TextField::new('geopointRandonnee', 'Geopoint'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('randonnée')
            ->setEntityLabelInPlural('Randonnées');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('nomRandonnee'))
            ->add(TextFilter::new('villeRandonnee'))
            ->add(ChoiceFilter::new('typeRandonnee')->setChoices(['choices' => ['Multi-activités' => 'Multi-activités', 'VTT' => 'VTT', 'Randonnée pédestre' => 'Randonnée pédestre',]]));
    }
}
