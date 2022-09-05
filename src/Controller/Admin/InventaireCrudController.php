<?php

namespace App\Controller\Admin;

use App\Entity\Inventaire;
use App\Entity\Exemplaire;

use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use Symfony\Component\HttpFoundation\Response;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InventaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Inventaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('codebar'),                      
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),
            AssociationField::new('exemplaire')
            
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance):void{

        
        if (!$entityInstance instanceof Inventaire) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);        

        parent::persistEntity($em, $entityInstance);

    }
    public function updateEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Inventaire) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);
        
        parent::updateEntity($em, $entityInstance);
    }
    
}
