<?php

namespace App\Controller\Admin;

use App\Entity\TypeActivite;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class TypeActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeActivite::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomTypeActivite', 'Nom'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Type d\'activité');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('nomTypeActivite'));
    }
}
