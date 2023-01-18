<?php

namespace App\Controller\Admin;

use App\Entity\TypePrestataire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class TypePrestataireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypePrestataire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomTypePrestataire', 'Nom'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('type de Prestataire')
            ->setEntityLabelInPlural('Type de Prestataires');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('nomTypePrestataire'));
    }
}
