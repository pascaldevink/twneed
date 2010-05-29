<?php


/**
 * Skeleton subclass for performing query and update operations on the 'raw_message' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Mon Mar 29 23:12:03 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class RawMessagePeer extends BaseRawMessagePeer {

    public static function saveMessage(array $message, PropelPDO $con = null)
    {
        $crit = new Criteria();
        $crit->add(self::MESSAGE_ID, $message['id']);

        $rawmessage = self::doSelectOne($crit);

        if (is_null($rawmessage))
        {
            $follower = FollowerPeer::createFollower($message['user'], $con);

            $rawmessage = new RawMessage();
            $rawmessage->setMessageId($message['id']);
            $rawmessage->setCreatedAt($message['created_at']);
            $rawmessage->setText($message['text']);
            $rawmessage->setFollower($follower);
            $rawmessage->save();

            return $rawmessage;
        }
        else
        {
            return null;
        }
    }

    public static function getLastMessage(PropelPDO $con = null)
    {
        $crit = new Criteria();
        $crit->addDescendingOrderByColumn(self::CREATED_AT);

        return self::doSelectOne($crit, $con);
    }
    
} // RawMessagePeer
