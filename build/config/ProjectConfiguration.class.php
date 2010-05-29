<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
    public function setup()
    {
        sfConfig::set('twitter_user_id', '124819247');
        sfConfig::set('twitter_username', 'twneed');
        sfConfig::set('twitter_password', 'dsh2bn23vz!');

        $this->enablePlugins('sfPropelPlugin');
        $this->enablePlugins('sfGuardPlugin');
        $this->enablePlugins('sfTwitterClientPlugin');
    }
}
