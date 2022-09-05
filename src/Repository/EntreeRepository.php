<?php

namespace App\Repository;

use App\Entity\Entree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entree>
 *
 * @method Entree|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entree|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entree[]    findAll()
 * @method Entree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entree::class);
    }

    public function add(Entree $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Entree $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Entree[] Returns an array of Entree objects
//     */
   public function findMaterial01(): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.sorti = :val')
            ->setParameter('val', 0)
            ->orderBy('e.id', 'ASC')            
            ->getQuery()
            ->getResult()
        ;
   }

   public function findMaterial(): array
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT DISTINCT Ca.nom AS Categorie, Ar.marque, Ar.nomModele, count(En.codebar) AS Nombre FROM App\Entity\Entree En 
        JOIN En.exemplaire Ex
        JOIN Ex.article Ar
        JOIN Ar.categorie Ca
        WHERE En.sorti=0
        GROUP BY Ar.nomModele');
        $result = $query->getResult();
        return $result;
   
   }
   public function trouverMaterielsSortis(): array
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT DISTINCT Ca.nom AS Categorie, Ar.marque, Ar.nomModele, count(En.codebar) AS Nombre FROM App\Entity\Entree En 
        JOIN En.exemplaire Ex
        JOIN Ex.article Ar
        JOIN Ar.categorie Ca
        WHERE En.sorti=1
        GROUP BY Ar.nomModele');
        $result = $query->getResult();
        return $result;
   
   }

    public function findExemplaire($value): ?Entree
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.codebar = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
