<?php

namespace App\Controller\Admin;

use App\Entity\Personnels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PersonnelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Personnels::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('password')->hideOnIndex()->hideWhenUpdating(),
            TextField::new('nom'),
            TextField::new('prenom'),
            ChoiceField::new('roles')
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
}
