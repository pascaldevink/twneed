<?php

/**
 * Retrieve followers from twitter and insert them into the database.
 *
 * @author pascaldevink
 */
class HarvestFollowers {

    private $service, $connection;

    public function HarvestFollowers($service, $connection = null)
    {
        $this->service = $service;
        $this->connection = $connection;
    }

    public function execute()
    {
        $followers = $this->service->getFollowers();

        //var_dump($followers);
        foreach ($followers as $follower)
        {
            FollowerPeer::createFollower($this->service, $follower, $this->connection);
        }
    }
}
?>
