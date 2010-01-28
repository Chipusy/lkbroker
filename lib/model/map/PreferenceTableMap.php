<?php


/**
 * This class defines the structure of the 'preference' table.
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
class PreferenceTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PreferenceTableMap';

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
		$this->setName('preference');
		$this->setPhpName('Preference');
		$this->setClassname('Preference');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ELEMENT_ID', 'ElementId', 'INTEGER', 'element', 'ID', false, null, null);
		$this->addForeignKey('CATEGORY_PREFERENCE_ID', 'CategoryPreferenceId', 'INTEGER', 'category_preference', 'ID', false, null, null);
		$this->addColumn('VALUE', 'Value', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('CategoryPreference', 'CategoryPreference', RelationMap::MANY_TO_ONE, array('category_preference_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Element', 'Element', RelationMap::MANY_TO_ONE, array('element_id' => 'id', ), 'CASCADE', null);
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

} // PreferenceTableMap
