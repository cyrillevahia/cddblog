<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;

use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class CategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            DateTimeField::new('updateAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),
            //TextEditorField::new('description'),
        ];
    }
    public function persistEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Categorie) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);
        parent::persistEntity($em, $entityInstance);

    }
    public function updateEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Categorie) return;
        $entityInstance->setUpdateAt(new \DateTimeImmutable);
        
        parent::updateEntity($em, $entityInstance);

    }
    
}
