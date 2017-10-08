<?php

namespace AppBundle\Twitter;

/**
 * Class MentionsService
 * @package AppBundle\Twitter
 */
class MentionsService
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * Mentions constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->connection->get("statuses/mentions_timeline");
    }
}
