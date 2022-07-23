<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        yield AvatarField::new('avatar')
            ->formatValue(static function($value, ?User $user) {
                return $user->getAvatarUrl();
            });
        /*yield ImageField::new('avatar')
            ->setBasePath('/img/avatar/')
            ->setUploadDir('public//img/avatar/')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');*/
        yield DateField::new('createdAt')
            ->hideOnForm();
        $roles = [
            'ROLE_ADMIN' => 'Admin',
            'ROLE_USER' => 'User',
        ];
        yield ArrayField::new('roles');
            // dispo symfo 6
            //->setChoices(array_combine($roles, $roles));
            //->allowMultipleChoices()
            //->renderExpanded();
        yield AssociationField::new('projects')
            ->setFormTypeOption('by_reference', false);

    }

}
