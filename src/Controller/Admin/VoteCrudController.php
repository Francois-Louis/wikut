<?php

namespace App\Controller\Admin;

use App\Entity\Vote;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vote::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
