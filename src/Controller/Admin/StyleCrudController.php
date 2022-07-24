<?php

namespace App\Controller\Admin;

use App\Entity\Style;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StyleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Style::class;
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
