<?php

namespace App\Controller\Admin;

use App\Entity\Blade;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BladeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Blade::class;
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
