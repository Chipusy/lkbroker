<?php if (!isset($active)): ?>
	<?php $active = '' ?>
<?php endif ?>

<ul>
	<li><a href="<?php echo url_for('@homepage') ?>" id="<?php echo ($sf_params->get('module') == 'page' and $sf_params->get('action') == 'index') ? 'active'.$active : '' ?>">О компании</a></li>
	<?php foreach (PagePeer::getList() as $key => $value): ?>
		<li><a href="<?php echo url_for('@page?name='.$value->getName()) ?>" id="<?php echo $sf_params->get('name') == $value->getName() ? 'active'.$active : '' ?>"><?php echo $value->getHeader() ?></a></li>
	<?php endforeach ?>
</ul>