<?php

namespace AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function FindName($id){
        /*$queryBuilder = $this->_em->createQueryBuilder()
            ->select('firstname')
            ->from($this->_entityName, 'firstname')
        ;
        $qb = $this->createQueryBuilder('a');
        $qb
            ->where('a.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb
            ->getQuery()
            ->getResult()
            ;*/
    }
}
