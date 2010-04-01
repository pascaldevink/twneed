<?php

class twneedHarvestDirectMessagesTask extends sfBaseTask
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

    $this->namespace        = 'twneed';
    $this->name             = 'harvestDirectMessages';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [twneed:harvestDirectMessages|INFO] task does things.
Call it with:

  [php symfony twneed:harvestDirectMessages|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $t = new Twitter(sfConfig::get('twitter_username'), sfConfig::get('twitter_password'));
    $last_dm = RawDmPeer::getLastDM($connection);
    $since = null;
    if ($last_dm)
    {
        $since = $last_dm->getDmId();
    }
    $dms = $t->getDirectMessages($since);

    foreach ($dms as $dm)
    {
        $rawdm = RawDmPeer::saveDirectMessage($dm, $connection);
        if ($rawdm instanceof RawDm)
        {
            $need = NeedPeer::convertDirectMessage($rawdm, $connection);
        }
        else
        {
            var_dump($rawdm);
        }
    }
    
  }
}
