<?php
	$ret = array('redirect' => $redirect ? url_for($redirect) : null);
?>
<script type="text/javascript">
	parent.stopStatusCheck(<?php echo json_encode($ret)?>);
</script>