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
	
	<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_company_price">
		<div>
			<label for="element_price_type">Валюта</label>
			<div class="content" id="element_price_type">
				<select name="element_price_type" id="element_price_type" size="1">
					<?php foreach (sfConfig::get('price_type') as $key3 => $value3): ?>
						<option <?php echo $Element->getPriceType() == $key3 ? 'selected' : '' ?> value="<?php echo $key3 ?>"><?php echo $value3 ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
	</div>
	
	<div id="file">
		<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_company_price">
			<div>
				<label for="element_file">Файлы</label>
				<div class="content">
					<div id="element_file">
						<div>
							<?php foreach ($Element->getElementFiles() as $key => $value): ?>
								<?php if ($value->getFileType() == 1): ?>
									<?php if (file_exists(sfConfig::get('upload_dir').'/150x150/'.$value->getName())): ?>
										<div id="file_<?php echo $value->getId() ?>" style="float:left;padding-bottom:10px;">
											<a style="position:absolute;" href="" onClick="delete_file(<?php echo $value->getId() ?>);return false;"><img width="16" src="/sfPropelPlugin/images/delete.png"/></a>
											
											<?php echo file_exists(sfConfig::get('upload_dir').'/500/'.$value->getName()) ? '<a href="/uploads/500/'.$value->getName().'" class="highslide" onclick="return hs.expand(this)">' : '<a href="/uploads/150x150/'.$value->getName().'" class="highslide" onclick="return hs.expand(this)">' ?>
												<img border="1" id="file_<?php echo $value->getId() ?>" class="file_photo" src="/uploads/150x150/<?php echo $value->getName() ?>"> 
											</a> &nbsp;
										</div>
									<?php endif ?>
								<?php endif ?>
							<?php endforeach ?>
						</div>
						
						<div style="clear:both;">
							<?php foreach ($Element->getElementFiles() as $key => $value): ?>
								<?php if ($value->getFileType() == 2): ?>
									<?php if (file_exists(sfConfig::get('upload_dir').'/doc/'.$value->getName())): ?>
										<p id="file_<?php echo $value->getId() ?>" style="clear:both;">
											<a style="position:absolute;" href="" onClick="delete_file(<?php echo $value->getId() ?>);return false;"><img width="16" src="/sfPropelPlugin/images/delete.png"/></a>
											<a style="padding-left:15px;" class="file_doc" href="/uploads/doc/<?php echo $value->getName() ?>"> <?php echo $value->getName() ?></a>
											</p>
									<?php endif ?>
								<?php endif ?>
							<?php endforeach ?>
						</div>
						
						<?php $i = 0; ?>
						<input  type="hidden" name="element_files_count" value="<?php echo $i-1 ?>" id="element_file_count">
						<a href="" onClick="one_more_file(<?php echo $i-1 ?>); return false;" id="add_file_button"><image width="16" src="/sfPropelPlugin/images/new.png">добавить файл</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div id="company">
		<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_company_price" style="height:30px;">
			<div>
				<label for="element_company">Компания продавец</label>
				<div class="content" id="element_company_content" height="20">
					
					<div id="name" style="float:left;">
						<select name="element_company" id="element_company" size="1">
							<option value=""></option>
							<?php foreach (CompanyPeer::getAll() as $key2 => $value2): ?>
								<option <?php echo $Element->getCompanyId() == $value2->getId() ? 'selected' : '' ?> value="<?php echo $value2->getId() ?>"><?php echo $value2->getName() ?></option>
							<?php endforeach ?>
						</select>
					</div>
					
					<div id="element_company_new" style="float:right;">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="sf_admin_form_row sf_admin_text sf_admin_form_field_parent_id">
		<div>
			<label for="element_category_id">Категория</label>
			<div class="content">
				<select name="element_category_id" id="element_category_id" size="1" onChange="add_preference_control()">
					<option value=""/>
					<?php $sub_categorys = CategoryPeer::getAllSub() ?>
					<?php foreach (CategoryPeer::getAllParent() as $key => $parent): ?>
						<option value="<?php echo $parent->getId() ?>" <?php echo $Element->getCategoryId() == $parent->getId()? 'selected':'' ?>> <?php echo $parent->getHeader() ?></option>
						<?php if (isset($sub_categorys[$parent->getId()])): ?>
							<?php foreach ($sub_categorys[$parent->getId()] as $key => $sub): ?>
								<option value="<?php echo $sub->getId() ?>" <?php echo $Element->getCategoryId() == $sub->getId()? 'selected':'' ?>> &mdash; <?php echo $sub->getHeader() ?></option>
							<?php endforeach ?>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="help"></div>
		</div>
	</div>
	
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
