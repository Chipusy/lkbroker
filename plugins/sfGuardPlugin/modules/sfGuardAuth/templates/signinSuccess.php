
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<style type="text/css" media="screen">
	th 
	{
		text-align: right;
		font-size: 13px;
	}
</style>

<center>
	<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
		<table width="300" style="border:1px solid #bbbbbb">
			<?php echo $form ?>
		</table>
		
		<input type="submit" value="войти" />
	</form>
</center>