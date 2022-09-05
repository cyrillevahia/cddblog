<?php

namespace App\Controller\Admin;

use App\Entity\Exemplaire;
use App\Entity\Entree;
use Doctrine\ORM\EntityManagerInterface;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExemplaireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Exemplaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('codebar'), 
            TextField::new('codeCrs'), 
            TextField::new('serial'), 
            AssociationField::new('article'),
            AssociationField::new('origine'),
            TextEditorField::new('etatInitial'),            
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm()
        ];
    }
    public function persistEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Exemplaire) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);
        
        parent::persistEntity($em, $entityInstance);

        //recherche de l'exemplaire dans la table entree

        $entreeRepos = $em->getRepository(Entree::class);
        $code = $entreeRepos->findExemplaire($entityInstance->getCodebar());
        //dd($code);
        $retour = new Entree();

        if(!$code){
            
            $retour->setCreatedAt(new \DateTimeImmutable);
            $retour->setCodebar($entityInstance->getCodebar());
            $retour->setExemplaire($entityInstance);
            $retour->setSorti(false);  
            $em->persist($retour);
            $em->flush($retour);


        }else{

            $code = $entreeRepos->findExemplaire($entityInstance->getCodebar());            
            $retour=$code->setSorti(false);           
            $em->flush($retour);

            
        }

    }
    public function updateEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Exemplaire) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);

        parent::updateEntity($em, $entityInstance);

    }

}
