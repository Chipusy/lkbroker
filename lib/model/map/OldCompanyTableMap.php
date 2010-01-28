<?php


/**
 * This class defines the structure of the 'modx_company' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Thu Jan 28 14:50:10 2010
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class OldCompanyTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.OldCompanyTableMap';

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
		$this->setName('modx_company');
		$this->setPhpName('OldCompany');
		$this->setClassname('OldCompany');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', false, 255, null);
		$this->addColumn('ADRESS', 'Adress', 'VARCHAR', false, 255, null);
		$this->addColumn('WEB', 'Web', 'VARCHAR', false, 255, null);
		$this->addColumn('PHONE', 'Phone', 'VARCHAR', false, 255, null);
		$this->addColumn('FAX', 'Fax', 'VARCHAR', false, 255, null);
		$this->addColumn('OUR_COMMENTS', 'OurComments', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ALL_COMMENTS', 'AllComments', 'VARCHAR', false, 255, null);
		$this->addColumn('PROCENT', 'Procent', 'LONGVARCHAR', false, null, null);
		$this->addColumn('OUR_COMMENT', 'OurComment', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
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

} // OldCompanyTableMap
