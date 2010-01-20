<td colspan="5">
  <?php echo __('%%id%% - %%parent_id%% - %%name%% - %%header%% - %%description%%', array('%%id%%' => link_to($Category->getId(), 'category_edit', $Category), '%%parent_id%%' => $Category->getParentId(), '%%name%%' => $Category->getName(), '%%header%%' => $Category->getHeader(), '%%description%%' => $Category->getDescription()), 'messages') ?>
</td>
