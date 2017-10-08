<?php

namespace AppBundle\Entity;

use DateTime;

/**
 * Class MentionFactory
 * @package AppBundle\Entity
 */
class MentionFactory
{
    /**
     * @param int $id
     * @param int $userId
     * @param string $userName
     * @param string $text
     * @param DateTime $createdAt
     * @return Mention
     */
    public function create(int $id, int $userId, string $userName, string $text, DateTime $createdAt)
    {
        $mention = new Mention();
        $mention->setId($id);
        $mention->setUserId($userId);
        $mention->setUserName($userName);
        $mention->setText($text);
        $mention->setCreatedAt($createdAt);

        return $mention;
    }
}