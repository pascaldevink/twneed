<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
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

        $this->dispatcher->connect('request.filter_parameters', array($this, 'filterRequestParameters'));
        $this->dispatcher->connect('view.configure_format', array($this, 'configureIPhoneFormat'));
    }

    public function filterRequestParameters(sfEvent $event, $parameters)
    {
        $request = $event->getSubject();

        if (preg_match('#Mobile/.+Safari#i', $request->getHttpHeader('User-Agent')))
        {
            $request->setRequestFormat('iphone');
        }

        return $parameters;
    }

    public function configureIPhoneFormat(sfEvent $event)
    {
        if ('iphone' == $event['format'])
        {
            // add some CSS, stylesheet, or whatever you want
        }
    }

}
