<?php


/**
 * This class defines the structure of the 'order' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Thu Jan 28 14:50:09 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class OrderTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.OrderTableMap';

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
		$this->setName('order');
		$this->setPhpName('Order');
		$this->setClassname('Order');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ELEMENT_ID', 'ElementId', 'INTEGER', 'element', 'ID', false, null, null);
		$this->addForeignKey('CLIENT_ID', 'ClientId', 'INTEGER', 'client', 'ID', false, null, null);
		$this->addForeignKey('ORDER_STATUS_ID', 'OrderStatusId', 'INTEGER', 'order_status', 'ID', false, null, null);
		$this->addColumn('DATE', 'Date', 'TIMESTAMP', false, null, null);
		$this->addColumn('COMMENT', 'Comment', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Element', 'Element', RelationMap::MANY_TO_ONE, array('element_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('OrderStatus', 'OrderStatus', RelationMap::MANY_TO_ONE, array('order_status_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Client', 'Client', RelationMap::MANY_TO_ONE, array('client_id' => 'id', ), 'CASCADE', null);
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
		);
	} // getBehaviors()

} // OrderTableMap
