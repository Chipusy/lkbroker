<br>
<center>
	<a href="<?php echo url_for('@homepage') ?>" class="<?php echo ($sf_params->get('module') == 'page' and $sf_params->get('action') == 'index') ? 'active' : '' ?>">главная</a>
	| <a href="<?php echo url_for('@catalog') ?>" class="<?php echo $sf_params->get('module') == 'catalog' ? 'active' : '' ?>">каталог</a>
	<?php foreach (PagePeer::getList() as $key => $value): ?>
		| <a href="<?php echo url_for('@page?name='.$value->getName()) ?>" class="<?php echo $sf_params->get('name') == $value->getName() ? 'active' : '' ?>"><?php echo mb_strtolower($value->getHeader()) ?></a>
	<?php endforeach ?>
</center>
<br>