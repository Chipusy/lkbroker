<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'удалить',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
  <?php echo $helper->linkToList(array(  'label' => 'показать все',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'сохранить',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'сохранить и добавить',  'params' =>   array(  ),  'class_suffix' => 'save_and_add',)) ?>
<?php else: ?>
  <?php echo $helper->linkToDelete($form->getObject(), array(  'label' => 'удалить',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
  <?php echo $helper->linkToList(array(  'label' => 'показать все',  'params' =>   array(  ),  'class_suffix' => 'list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'label' => 'сохранить',  'params' =>   array(  ),  'class_suffix' => 'save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'label' => 'сохранить и добавить',  'params' =>   array(  ),  'class_suffix' => 'save_and_add',)) ?>
<?php endif; ?>
</ul>
