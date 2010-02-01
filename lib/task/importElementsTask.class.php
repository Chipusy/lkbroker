<?php

class importElementsTask extends sfBaseTask
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
      //new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
      // add your own options here
    ));

    $this->namespace        = '';
    $this->name             = 'importElements';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [importElements|INFO] task does things.
Call it with:

  [php symfony importElements|INFO]
EOF;
  }

	protected function execute($arguments = array(), $options = array())
	{
		$sxe = simplexml_load_file("/www/lk-broker/data/xml/test.xml");
		
		foreach ($sxe->offers as $item) {
			foreach ($item as $key => $value) 
			{
				echo trim($value->name)."\n";
			}
		}
	}
}
