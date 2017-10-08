<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MentionRepository extends EntityRepository
{
    public function getUsers()
    {
        return $this->createQueryBuilder('m')
            ->select(['m.userId', 'm.userName'])
            ->groupBy('m.userId')
            ->orderBy('m.userId', 'ASC')
            ->getQuery()->getResult();
    }
}