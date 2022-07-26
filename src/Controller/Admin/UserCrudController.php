<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
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
        yield ImageField::new('avatar')
            ->setBasePath('/assets/img/avatar/')
            ->setUploadDir('public/assets/img/avatar/')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
        yield DateField::new('createdAt')
            ->onlyOnDetail();
        $roles = [
            'ROLE_ADMIN' => 'Admin',
            'ROLE_USER' => 'User',
        ];
        yield ArrayField::new('roles')
            ->hideOnIndex();
            // dispo symfo 6
            //->setChoices(array_combine($roles, $roles));
            //->allowMultipleChoices()
            //->renderExpanded();
        yield AssociationField::new('projects')
            ->setFormTypeOption('by_reference', false);
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->setPermission(Action::NEW, 'ROLE_ADMIN')
            ->setPermission(Action::DELETE, 'ROLE_ADMIN')
            ->setPermission(Action::BATCH_DELETE, 'ROLE_ADMIN');
    }


}
