<script type="text/javascript" charset="utf-8">
	
	$(document).ready(function(){
		$('#category_header').syncTranslit({
			destination: 'category_name',
			urlSeparator: '_'
		});
	});
</script>

<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
  <?php if ('NONE' != $fieldset): ?>
    <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
  <?php endif; ?>
	
	<?php foreach ($fields as $name => $field): ?>
		<?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
		<?php include_partial('category/form_field', array(
			'name'       => $name,
			'attributes' => $field->getConfig('attributes', array()),
			'label'      => $field->getConfig('label'),
			'help'       => $field->getConfig('help'),
			'form'       => $form,
			'field'      => $field,
			'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
		)) ?>
	<?php endforeach; ?>
	
	<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_parent_id">
		<div>
			<label for="category_parent_id">Родительская категория</label>
			<div class="content">
				<select name="category[parent_id]" id="category_parent_id" size="1" onChange="add_preference_control()">
					<option value="0"> нет родительской категории</option>
					<?php foreach (CategoryPeer::getAllParent() as $key => $parent): ?>
						<?php if ($Category->getId() != $parent->getId()): ?>
							<option value="<?php echo $parent->getId() ?>" <?php echo $Category->getParentId() == $parent->getId()? 'selected':'' ?>> &mdash; <?php echo $parent->getHeader() ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="help">
				<a <?php echo $Category->getParentId() == 0 ? 'style="display:none;"':'' ?> id="add_preference_button" href="" onClick="add_preference();return false;">применить шаблон свойств</a>
			</div>
		</div>
	</div>
	
	<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_preference">
		<div>
			<label for="category_preference">Свойства категории</label>
			<div class="content">
				<div id="preference">
					<?php $i = 0; ?>
					<?php if (isset($Category)): ?>
						<?php foreach ($Category->getCategoryPreferences() as $key => $value): ?>
							<div id="preference_<?php echo $i ?>">
								<a href="" onClick="delete_one(<?php echo $i ?>); return false;" alt="Удалить!" id=""><img width="16" src="/sfPropelPlugin/images/delete.png"></a>
								<input type="hidden" name="category_preference[<?php echo $i ?>][id]" value="<?php echo $value->getId() ?>" class="preference_<?php echo $i ?>" id="category_preference[<?php echo $i ?>][id]">
								<input type="text" id="category_name" value="<?php echo $value->getKey() ?>" name="category_preference[<?php echo $i ?>][name]"/>
								фильтр: <input type="checkbox" name="category_preference[<?php echo $i ?>][filter_status]" value="1" <?php echo $value->getFilterStatus() == 1? 'checked' : '' ?>>
								тип:<select name="category_preference[<?php echo $i ?>][preference_type]" size="1">
									<?php foreach (sfConfig::get('preference_type') as $key1 => $value1): ?>
										<option <?php echo $value->getPreferenceType() == $key1? 'selected':'' ?> value="<?php echo $key1 ?>"><?php echo $value1 ?></option>
									<?php endforeach ?>
								</select>
								ед. изерения: <input type="text" name="category_preference[<?php echo $i ?>][preference_unit]" value="<?php echo $value->getPreferenceUnit() ?>" id="">
								
								<br>
								<br>
							</div>
							<?php $i++; ?>
						<?php endforeach ?>
					<?php else: ?>
						<div id="preference_<?php echo $i ?>">
							<input type="text" id="category_name" value="" name="category_preference[<?php echo $i ?>][name]"/>
							<input type="checkbox" name="category_preference[<?php echo $i ?>][filter_status]" value="1">
							<br>
							<br>
						</div>
					<?php endif ?>
					<input type="hidden" name="elements_count" value="<?php echo $i-1 ?>" id="elements_count">
					<a href="" onClick="one_more(<?php echo $i-1 ?>); return false;" id="add_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить свойство</a>
				</div>
			</div>
			<div class="help">&nbsp;</div>
		</div>
	  </div>
</fieldset>