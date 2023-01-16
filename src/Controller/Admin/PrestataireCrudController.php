<?php

namespace App\Controller\Admin;

use App\Entity\Prestataire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\NumericFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class PrestataireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prestataire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomPrestataire', 'Nom'),
            TextEditorField::new('descriptionPrestataire', 'Description'),
            NumberField::new('inseePrestataire', 'code INSEE'),
            TextField::new('villePrestataire', 'Ville'),
            TextField::new('geopointPrestataire', 'Geopoint'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Prestataire');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('nomPrestataire'))
            ->add(NumericFilter::new('inseePrestataire'))
            ->add(TextFilter::new('villePrestataire'));
    }
}
