<?php


/**
 * Skeleton subclass for performing query and update operations on the 'raw_dm' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Sat Mar 20 21:30:17 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class RawDmPeer extends BaseRawDmPeer {

    public static function saveDirectMessage(array $dm, PropelPDO $con = null)
    {
        $crit = new Criteria();
        $crit->add(self::DM_ID, $dm['id']);

        $rawdm = self::doSelectOne($crit);

        if (is_null($rawdm))
        {
            $follower = FollowerPeer::createFollower($dm['sender'], $con);

            $rawdm = new RawDm();
            $rawdm->setDmId($dm['id']);
            $rawdm->setCreatedAt($dm['created_at']);
            $rawdm->setText($dm['text']);
            $rawdm->setFollower($follower);
            $rawdm->save();

            return $rawdm;
        }
        else
        {
            return null;
        }
    }

    public static function getLastDM(PropelPDO $con = null)
    {
        $crit = new Criteria();
        $crit->addAscendingOrderByColumn(self::CREATED_AT);

        return self::doSelectOne($crit, $con);
    }
} // RawDmPeer
