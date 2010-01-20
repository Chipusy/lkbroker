<td colspan="1">
	<?php echo $Category->getParentId() != 0 ? '&mdash;': '' ?>
  <?php echo __('%%header%% ', array('%%header%%' => link_to($Category->getHeader(), 'category_edit', $Category)), 'messages') ?>
</td>
