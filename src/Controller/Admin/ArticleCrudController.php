<?php

namespace App\Controller\Admin;

use App\Entity\Article;

use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('categorie'),
            TextField::new('marque'), 
            TextField::new('nomModele'),                       
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm()
   
        ];
    }
    public function persistEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Article) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);
        
        parent::persistEntity($em, $entityInstance);

    }
    public function updateEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Article) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);

        parent::updateEntity($em, $entityInstance);

    }
    
}
