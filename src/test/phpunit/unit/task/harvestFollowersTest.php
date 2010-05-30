<?php

require_once dirname(__FILE__) . '/../../bootstrap/unit.php';
require_once 'Mockery/Loader.php';

class unit_harvestFollowersTest extends sfPHPUnitBaseTestCase
{

    public function _start()
    {
        $this->getTest()->diag('Harvest Followers test is starting');
        $loader = new \Mockery\Loader;
        $loader->register();

        // database
        $appconfiguration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);
        new sfDatabaseManager($appconfiguration);

        // Ugly workaround for clearing all data beforehand
        // FIXME: Create a better solution
        Propel::getConnection()->exec('TRUNCATE TABLE follower');
    }

    public function _end()
    {
        $this->getTest()->diag('Harvest Followers test is done');
    }

    public function testDefault()
    {
        $followers = array(array('id'=>'14139010',
                                'name'=>'Pascal de Vink',
                                'screen_name'=>'pascaldevink',
                                'description'=>'Mock description',
                                'location'=>'Amsterdam, NL',
                                'url'=>'',
                                'protected'=>false,
                                'followers_count'=>45,
                                'profile_image_url'=>'http://a1.twimg.com/profile_images/429161922/twtr_normal.png'
                               ),
                           array('id'=>'14139011',
                                'name'=>'Jan de Vries',
                                'screen_name'=>'jandevries',
                                'description'=>'Mock description',
                                'location'=>'Lutjebroek, NL',
                                'url'=>'',
                                'protected'=>false,
                                'followers_count'=>2,
                                'profile_image_url'=>'http://a1.twimg.com/profile_images/429161922/twtr_normal.png'
                               )
                         );

        

        // Setup mocking
        $mock = Mockery::mock('twitter');
        $mock->shouldReceive('getFollowers')->once()->andReturn($followers)->ordered();
        $mock->shouldReceive('existsFriendship')->with(Mockery::type('string'),Mockery::type('string'))->twice()->andReturn(true, false);
        $mock->shouldReceive('createFriendship')->with(Mockery::type('string'))->once();
        
        // Call the task and inject the mock
        $harvester = new HarvestFollowers($mock);
        $harvester->execute();

        // Verify the mock
        $mock->mockery_verify();

        // Verify if there are indeed 2 followers
        $t = $this->getTest();
        $criteria = new Criteria(FollowerPeer::TABLE_NAME);
        $this->getTest()->is(2, count(FollowerPeer::doSelect($criteria)), 'Test for created followers');
    }

}

