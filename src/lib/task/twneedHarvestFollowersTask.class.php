<?php

class twneedHarvestFollowersTask extends sfBaseTask
{

    protected function configure()
    {
        // // add your own arguments here
        // $this->addArguments(array(
        //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
        // ));

        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
                // add your own options here
        ));

        $this->namespace = 'twneed';
        $this->name = 'harvestFollowers';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
            The [twneed:harvestFollowers|INFO] task does things.
            Call it with:

            [php symfony twneed:harvestFollowers|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array())
    {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

        $service = new Twitter(sfConfig::get('twitter_username'), sfConfig::get('twitter_password'));
        $harvester = new HarvestFollowers($service, $connection);
        $harvester->execute();
    }

}
