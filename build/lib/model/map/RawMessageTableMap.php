<?php


/**
 * This class defines the structure of the 'raw_message' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Mon May  3 09:55:52 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class RawMessageTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.RawMessageTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('raw_message');
		$this->setPhpName('RawMessage');
		$this->setClassname('RawMessage');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('MESSAGE_ID', 'MessageId', 'BIGINT', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'BIGINT', true, null, null);
		$this->addColumn('TEXT', 'Text', 'VARCHAR', true, 140, null);
		$this->addForeignKey('FOLLOWER_ID', 'FollowerId', 'INTEGER', 'follower', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Follower', 'Follower', RelationMap::MANY_TO_ONE, array('follower_id' => 'id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // RawMessageTableMap
