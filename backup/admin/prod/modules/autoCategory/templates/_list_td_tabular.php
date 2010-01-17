<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Category->getId(), 'category_edit', $Category) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_parent_id">
  <?php echo $Category->getParentId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $Category->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_header">
  <?php echo $Category->getHeader() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $Category->getDescription() ?>
</td>
