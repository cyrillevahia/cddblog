<?php

namespace App\Repository;

use App\Entity\Exemplaire;
use App\Entity\Categorie;
use App\Entity\Article;
use App\Entity\Inventaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

/**
 * @extends ServiceEntityRepository<Exemplaire>
 *
 * @method Exemplaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exemplaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exemplaire[]    findAll()
 * @method Exemplaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExemplaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exemplaire::class);
    }

    public function add(Exemplaire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Exemplaire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Exemplaire[] Returns an array of Exemplaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function findExemplaire($value): ?Exemplaire
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.codebar = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function listeMaterielsNonInventories($debut,$fin):array
    {
      
        //Récupération de tous les exemplaires inventoriés
        $qbInventories = $this->getEntityManager()->getRepository(inventaire::class)
                    ->createQueryBuilder('i')
                    ->select('i.codebar')
                    ->where('i.createdAt BETWEEN :debut AND :fin');
                   
        //Récupération de tous les exemplaires non inventoriés
                    $qbNonInventories = $this->createQueryBuilder('e')
                    ->where('e.codebar NOT IN (' . $qbInventories->getDQL() . ')')
                    ->setParameter('debut', $debut)
                    ->setParameter('fin', $fin);
        return $qbNonInventories->getQuery()->execute();

    }

    
}
