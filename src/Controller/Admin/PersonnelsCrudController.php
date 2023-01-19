<?php

namespace App\Controller\Admin;

use App\Entity\Personnels;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;

class PersonnelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Personnels::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new('email', 'Email'),
            TextField::new('plainPassword', 'Mot de passe')->hideOnIndex()->hideWhenUpdating(),
            TextField::new('nom', 'Nom'),
            TextField::new('prenom', 'Prénom'),
            ChoiceField::new('roles', 'Roles')
                ->allowMultipleChoices()
                ->autocomplete()
                ->setChoices(
                    [
                        'Admin' => 'ROLE_ADMIN',
                        'Accompagnateur' => 'ROLE_ACCOMPAGNATEUR'
                    ]
                )
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('personel')
            ->setEntityLabelInPlural('Personels');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(TextFilter::new('email'))
            ->add(TextFilter::new('nom'));
    }
}
