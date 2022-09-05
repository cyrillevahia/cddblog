<?php

namespace App\Controller\Admin;

use App\Entity\Origine;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OrigineCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Origine::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('origine'),
            DateTimeField::new('updateAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),
        ];
    }
    public function persistEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Origine) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);
        parent::persistEntity($em, $entityInstance);

    }
    public function updateEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Origine) return;
        $entityInstance->setUpdateAt(new \DateTimeImmutable);
        
        parent::updateEntity($em, $entityInstance);
    }
}
