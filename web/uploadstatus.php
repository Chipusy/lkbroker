<?php
	
	$data = null;
	
	if (isset($_GET['upload_key']))
	{
		$data = uploadprogress_get_info($_GET['upload_key']);
		
		if(!$data)
		{
			sleep(1);
			$data = uploadprogress_get_info($_GET['upload_key']);
		}
	}
	
	echo json_encode($data);