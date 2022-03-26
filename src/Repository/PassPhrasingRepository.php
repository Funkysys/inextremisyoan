<?php

namespace App\Repository;

use App\Entity\PassPhrasing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PassPhrasing|null find($id, $lockMode = null, $lockVersion = null)
 * @method PassPhrasing|null findOneBy(array $criteria, array $orderBy = null)
 * @method PassPhrasing[]    findAll()
 * @method PassPhrasing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PassPhrasingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PassPhrasing::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PassPhrasing $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(PassPhrasing $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PassPhrasing[] Returns an array of PassPhrasing objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PassPhrasing
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
