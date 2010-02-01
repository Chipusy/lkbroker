<div class="link_way">
	<a href="<?php echo url_for('@homepage') ?>">Каталог</a> &gt;&gt; 

	<?php if ($element->getCategory()->getParentId() != 0): ?>
		<a href="<?php echo url_for('@catalog?category_name='.$element->getCategory()->getParent()->getName()) ?>"><?php echo $element->getCategory()->getParent()->getHeader() ?></a>  &gt;&gt; 
	<?php endif ?>

	<a href="<?php echo url_for('@catalog?category_name='.$element->getCategory()->getName()) ?>"><?php echo $element->getCategory()->getHeader() ?></a> &gt;&gt; 
	<a href="<?php echo url_for('@element?category_name='.$element->getCategory()->getName().'&element_id='.$element->getId()) ?>"><?php echo $element->getName() ?></a>
</div>

<div class="name_stuff">
	<h1>Мобильная щековая дробилка Rubble Master RM80</h1>
</div>
<div class="print_version"><a href="#">версия для печати</a></div>

<div class="stuff_images">
	<?php foreach ($element->getElementFiles() as $file): ?>
		<?php if ($file->getFileType() == 1): ?>
			<div class="stuff_img"><a href="#"><img src="/uploads/150x150/<?php echo $file->getName() ?>" alt="<?php echo $element->getName() ?>" /></a></div>
		<?php endif ?>
	<?php endforeach ?>
	
	<?php foreach ($element->getElementFiles() as $file): ?>
		<?php if ($file->getFileType() == 2): ?>
			
		<?php endif ?>
	<?php endforeach ?>
</div>

<div class="stuff_details">
	<?php foreach ($element->getPreferences() as $preference): ?>
		<?php echo $preference->getCategoryPreference()->getKey() ?>:.....................<span class="dark"><?php echo $preference->getValue() ?> <?php echo $preference->getCategoryPreference()->getPreferenceUnit() ?></span> <br />
	<?php endforeach ?>
	Цена:............................... <span class="dark"><?php echo $element->getCompanyPrice() ?> руб.</span> <br />
	<br />
	<br />
	<span class="articul">Артикул: ЛК - <?php echo $element->getId() ?></span>
</div>

<div class="clear"><img src="/images/spacer.gif" alt="" height="1" /></div>

<div class="technik_details">

	<span class="technik_details_name">Технические характеристики</span>
	<p><?php echo $element->getDescription() ?></p>
	<div class="clear"><img src="/images/spacer.gif" alt="" height="1" /></div>
</div>


<span class="block_zayavka_name">Форма заявки</span>
<div class="block_zayavka">
	<table>
		<tr>
			<td style="width:180px;">Наименование</td>
			<td>Мобильная щековая дробилка Rubble Master RM80 <br /> Артикул - 2166</td>
		</tr>
		<tr>
			<td>Контактное лицо</td>
			<td><input type="text" class="input_small" name="name" /></td>
		</tr>
		<tr>
			<td>Телефон</td>
			<td><input type="text" class="input_small" name="tel_number" /></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" class="input_small" name="email" /></td>
		</tr>
		<tr>
			<td>Сделать заявку на</td>
			<td><input type="checkbox" name="1" /> лизинг &nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="2" /> кредит &nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="3" /> кертинг
			</td>
		</tr>
		<tr>
			<td>Примечания</td>
			<td><textarea cols="55" rows="15" name="in_txt" class="input_big"></textarea></td>
		</tr>
		<tr><td colspan="2"><input type="button" value="Показать позиции" class="zayavka_button" name="zayavka_submit" 	/></td></tr>
	</table>
</div>

</div>

<div class="clear"><img src="/images/spacer.gif" alt="" height="1" /></div>

<br />
