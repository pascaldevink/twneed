<?php

class twneedHarvestMessagesTask extends sfBaseTask
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
    $this->name             = 'harvestMessages';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [twneed:harvestMessages|INFO] task does things.
Call it with:

  [php symfony twneed:harvestMessages|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $t = new Twitter(sfConfig::get('twitter_username'), sfConfig::get('twitter_password'));
    $last_message = RawMessagePeer::getLastMessage($connection);
    $since = null;
    if ($last_message)
    {
        $since = $last_message->getMessageId();
    }
    $messages = $t->getMentionsReplies($since);

    foreach ($messages as $message)
    {
        $rawmessage = RawMessagePeer::saveMessage($message, $connection);
        $need = NeedPeer::convertMessage($rawmessage, $con);
    }
  }
}
