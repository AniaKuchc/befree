<?php

namespace App\Controller\Admin;

use App\Entity\CatalogueRandonnee;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class CatalogueRandonneeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CatalogueRandonnee::class;
    }

    public function configureFields(string $pageName): iterable
    {

        return [
            AssociationField::new('randonnees', 'Liste des randonnées')->setFormTypeOptions([
                'by_reference' => false,
                'empty_data' => 'nomRandonnee',
            ]),
            DateField::new('dateProposedRando', 'Date de la rando du mois'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('catalogue Randonnee')
            ->setEntityLabelInPlural('Catalogue Randonnee');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('randonnees'));
    }
}
