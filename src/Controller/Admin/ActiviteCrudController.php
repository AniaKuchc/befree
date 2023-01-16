<?php

namespace App\Controller\Admin;

use App\Entity\Activite;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\NumericFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class ActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Activite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('activitePrestataire', 'Prestataire de l\'activite'),
            AssociationField::new('ActiviteType', 'Type d\'activite'),
            AssociationField::new('activiteRandonnee', 'Randonnee'),
            TextField::new('nomActivite', 'Nom'),
            TextEditorField::new('descriptionActivite', 'Description'),
            DateTimeField::new('dateActivite', 'date'),
            NumberField::new('placeMaximum', 'Place maximum'),
            BooleanField::new('afficherActivite', 'Afficher ?'),
            AssociationField::new('activiteAdresse', 'Adresse de l\'activite'),
            AssociationField::new('activiteOffre', 'Offre dont dépend l\'activite'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Activite');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('nomActivite'))
            ->add(DateTimeFilter::new('dateActivite'))
            ->add(NumericFilter::new('placeMaximum'))
            ->add(BooleanFilter::new('afficherActivite'));
    }
}
