<?php

namespace AppBundle\Twitter;

/**
 * Class Statuses
 * @package AppBundle\Twitter
 */
class Statuses
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
    public function getMentions()
    {
        return $this->connection->get("statuses/mentions_timeline");
    }

    /**
     * @param string $status
     * @return bool
     */
    public function postStatus(string $status)
    {
        $this->connection->post("statuses/update", ["status" => $status]);
    }
}
