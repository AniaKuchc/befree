<?php

namespace App\Controller\Admin;

use App\Entity\Clients;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;


class ClientsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Clients::class;
    }

    public function configureFields(string $pageName): iterable
    {

        yield EmailField::new('email');
        yield TextField::new('plainPassword', 'Mot de passe')->hideOnIndex()->hideWhenUpdating()->setFormTypeOption('required', false);
        yield TextField::new('nomClient', 'Nom');
        yield TextField::new('prenomClient', 'Prenom');
        yield TextField::new('telephoneClient', 'Téléphone');
        yield ArrayField::new('roles', 'Roles')->setFormTypeOption('disabled', true);
        yield AssociationField::new('adresse', 'Adresse')->renderAsEmbeddedForm();
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('client')
            ->setEntityLabelInPlural('Clients');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('email'))
            ->add(TextFilter::new('nomClient'));
    }
}
