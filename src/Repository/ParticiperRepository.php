<?php

namespace App\Repository;

use App\Entity\Participer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Participer>
 */
class ParticiperRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Participer::class);
    }

    public function findOneByCampeur($matricule)
    {
        return $this->createQueryBuilder('p')
            ->addSelect('c')
            ->leftJoin('p.campeur', 'c')
            ->where('c.matricule = :matricule')
            ->setParameter('matricule', $matricule)
            ->setMaxResults(1)
            ->getQuery()->getOneOrNullResult()
            ;
    }

    public function findAllByStatut(?bool $statut)
    {
        $query = $this->globalSelect();
        if ($statut){
            $query->where('p.waveCheckoutStatus = :statut');
        }else{
            $query->where('p.waveCheckoutStatus <> :statut');
        }

        return $query->setParameter('statut', 'complete')
            ->getQuery()->getResult();
    }

    public function findByMatricule($matricule)
    {
        return $this->globalSelect()
            ->where('c.matricule = :matricule')
            ->setParameter('matricule', $matricule)
            ->getQuery()->getOneOrNullResult()
            ;
    }

    private function globalSelect(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->addSelect('c', 's', 'd', 'v', 'f')
            ->join('p.formation', 'f')
            ->join('p.campeur', 'c')
            ->join('c.section', 's')
            ->join('s.doyenne', 'd')
            ->join('d.vicariat', 'v');
    }

    //    /**
    //     * @return Participer[] Returns an array of Participer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Participer
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

}
