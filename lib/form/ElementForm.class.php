<?php

/**
 * Element form.
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ElementForm extends BaseElementForm
{
	public function configure()
	{
		unset($this['category_id'], $this['price_type'], $this['company_id'], $this['date_updated'], $this['date_created'], $this['view_count'], $this['order_count']);
	}
}
