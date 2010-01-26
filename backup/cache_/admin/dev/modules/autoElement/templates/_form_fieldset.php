<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
  <?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
  <?php endif; ?>

  <?php foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    <?php include_partial('element/form_field', array(
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?>
  <?php endforeach; ?>

	<div id="preference">
		<?php if ($sf_params->get('action') != 'new' and $Element->getCategoryId() != ''): ?>
			<?php $i = 0; ?>
			<?php foreach ($Element->getCategory()->getCategoryPreferences() as $key => $value): ?>
				<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_company_price">
					<div>
						<label for="element_preference"><?php echo $value->getKey() ?></label>
						<div class="content">
							
							<?php if ($value->getPreferenceType() == 3): ?>
								<input type="checkbox" name="element_preference[<?php echo $i ?>][value]" value="1" id="element_preference[<?php echo $i ?>]" <?php if(isset($preferenceArray[$value->getId()])) echo $preferenceArray[$value->getId()]->getValue() == '1' ? 'checked' : '' ;?>>
							<?php else: ?>
								<input type="text" id="element_preference[<?php echo $i ?>]" value="<?php echo isset($preferenceArray[$value->getId()]) ? $preferenceArray[$value->getId()]->getValue() : '' ?>" name="element_preference[<?php echo $i ?>][value]"/> <?php echo $value->getPreferenceUnit() ?>
							<?php endif ?>
							
							<input type="hidden" name="element_preference[<?php echo $i ?>][id]" value="<?php echo isset($preferenceArray[$value->getId()]) ? $preferenceArray[$value->getId()]->getId() : '' ?>" id="element_preference[<?php echo $i ?>][id]">
							<input type="hidden" name="element_preference[<?php echo $i ?>][category_preference_id]" value="<?php echo $value->getId() ?>" id="element_preference[<?php echo $i ?>][category_preference_id]">
						</div>
					</div>
				</div>
			<?php $i++; ?>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</fieldset>
