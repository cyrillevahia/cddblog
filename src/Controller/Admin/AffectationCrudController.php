<?php

namespace App\Controller\Admin;

use App\Entity\Affectation;
use App\Entity\Entree;

use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AffectationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Affectation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('codebar'), 
            AssociationField::new('exemplaire'),
            AssociationField::new('personnel'),
            AssociationField::new('emplacement'),
            AssociationField::new('projet'),
            AssociationField::new('volet'),   
            TextEditorField::new('etatActuel'),            
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm()
        ];
    }
    public function persistEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Affectation) return;
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
            $retour->setExemplaire($entityInstance->getExemplaire());
            if($entityInstance->getPersonnel()->getID()=='1'){
                $retour->setSorti(false);  
            }else{
                $retour->setSorti(true);  
            }
                 
            $em->persist($retour);
            $em->flush($retour);


        }else{

            $code = $entreeRepos->findExemplaire($entityInstance->getCodebar());
            if($entityInstance->getPersonnel()->getID()=='1'){
            $retour=$code->setSorti(false);
            }else{
            $retour=$code->setSorti(true);
            }
            $em->flush($retour);

            
        }


       

    }
    public function updateEntity(EntityManagerInterface $em, $entityInstance):void{
        if (!$entityInstance instanceof Affectation) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);

        parent::updateEntity($em, $entityInstance);

    }
    
}
