<?php

namespace App\Controller\Admin;

use App\Entity\Media;


use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MediaCrudController extends AbstractCrudController
{
    public const MEDIA_BASE_PATH = 'img/upload/media';
    public const MEDIA_UPLOAD_DIR = 'assets/img/upload/media';

    public static function getEntityFqcn(): string
    {
        return Media::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('post'),
            ImageField::new('media')
                ->setBasePath(self::MEDIA_BASE_PATH)
                ->setUploadDir(self::MEDIA_UPLOAD_DIR),
            TextEditorField::new('legende'),
            DateTimeField::new('updatedAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm()
        ];
    }
    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Media) return;
        $entityInstance->setCreatedAt(new \DateTimeImmutable);

        parent::persistEntity($em, $entityInstance);
    }
    public function updateEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Media) return;
        $entityInstance->setUpdatedAt(new \DateTimeImmutable);

        parent::updateEntity($em, $entityInstance);
    }
}
