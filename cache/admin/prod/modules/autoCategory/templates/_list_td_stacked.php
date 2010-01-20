<td colspan="2">
  <?php echo __('%%name%% - %%header%%', array('%%name%%' => link_to($Category->getName(), 'category_edit', $Category), '%%header%%' => link_to($Category->getHeader(), 'category_edit', $Category)), 'messages') ?>
</td>
