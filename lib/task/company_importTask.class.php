<?php

class company_importTask extends sfBaseTask
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

    $this->namespace        = '';
    $this->name             = 'company_import';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [company_import|INFO] task does things.
Call it with:

  [php symfony company_import|INFO]
EOF;
  }

	protected function execute($arguments = array(), $options = array())
	{
		// initialize the database connection
		$databaseManager = new sfDatabaseManager($this->configuration);
		$connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();
	
		$con = Propel::getConnection();
		$q = "SELECT * FROM modx_company";
		$companys = $con->executeQuery($q, ResultSet::FETCHMODE_ASSOC);
		
		foreach ($companys as $key => $value) 
		{
			var_dump($value);exit;
		}
		
	}
}
