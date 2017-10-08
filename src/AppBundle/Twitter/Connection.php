<?php

namespace AppBundle\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * Class Connection
 * @package AppBundle\Twitter
 */
class Connection
{
    /**
     * @var string
     */
    private $consumerKey;
    /**
     * @var string
     */
    private $consumerSecret;
    /**
     * @var string
     */
    private $accessToken;
    /**
     * @var string
     */
    private $accessTokenSecret;

    /**
     * @var TwitterOAuth
     */
    private $client;

    /**
     * Connection constructor.
     * @param string $consumerKey
     * @param string $consumerSecret
     * @param string $accessToken
     * @param string $accessTokenSecret
     */
    public function __construct(
        string $consumerKey,
        string $consumerSecret,
        string $accessToken,
        string $accessTokenSecret
    ) {

        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->accessToken = $accessToken;
        $this->accessTokenSecret = $accessTokenSecret;

        $this->client = new TwitterOAuth(
            $this->consumerKey,
            $this->consumerSecret,
            $this->accessToken,
            $this->accessTokenSecret
        );
        $this->client->get("account/verify_credentials");
    }

    /**
     * @param string $path
     * @return TwitterOAuth
     */
    public function get(string $path)
    {
        return $this->client->get($path);
    }
}