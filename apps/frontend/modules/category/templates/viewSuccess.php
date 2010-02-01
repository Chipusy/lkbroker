
<div class="link_way">
	<a href="<?php echo url_for('@homepage') ?>">Каталог</a> &gt;&gt; 
	
	<?php if ($category->getParentId() != 0): ?>
		<a href="<?php echo url_for('@catalog?category_name='.$parentCategory->getName()) ?>"><?php echo $parentCategory->getHeader() ?></a> &gt;&gt; 
	<?php endif ?>
	
	<a href="<?php echo url_for('@catalog?category_name='.$category->getName()) ?>"><span class="big_link"><?php echo $category->getHeader() ?></span></a>
	
</div>
<?php /*
<div class="block_positions">
	<table>
		<tr>
			<td style="width:180px;">Марка</td>
			<td style="width:320px;">
				<select name="params_marka" class="params_input">
					<option value="0">Не имеет значения</option>
					<option value="1">Renault</option>
					<option value="2">Pevgeot</option>
					<option value="3">Mersedes</option>
				</select>
			</td>
			<td rowspan="3" style="vertical-align:top;">
				<div class="sub_menu">
					<ul>
						<li>- <a href="#">Китайские автовозы </a></li>
						<li>- <a href="#">Европейские автовозы</a></li>
						<li>- <a href="#">Отечественные автовозы</a></li>
						<li>- <a href="#">Прицепы автовозы</a></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
			<td>Год</td>
			<td>от&nbsp;
				<select name="params_year" class="params_input_year">
					<option value="0">Любой</option>
					<option value="1">1</option>
					<option value="2">3</option>
					<option value="3">5</option>
				</select>
				&nbsp;&nbsp;до&nbsp;
				<select name="params_year" class="params_input_year">
					<option value="0">Любой</option>
					<option value="1">1</option>
					<option value="2">3</option>
					<option value="3">5</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Местонахождение</td>
			<td>
				<select name="params_strana" class="params_input">
					<option value="0">Не имеет значения</option>
					<option value="1">Россия</option>
					<option value="2">Германия</option>
					<option value="3">Франция</option>
				</select>
			</td>
		</tr>
	</table>
</div>

<div class="count_stuffs">
	<span class="dark">Показывать по:</span> <a href="#">10</a> :: <a href="#">20</a> :: <a href="#">30</a> :: <a href="#">50</a> :: <a href="#">100</a> :: <a href="#">все</a>
</div>


<div class="cat_button">
	<input type="button" value="Показать позиции" class="category_button" name="category_submit" />
</div>
 */ ?>

<div class="sub_menu">
	<table border="0" cellspacing="5" cellpadding="5">
		<tr>
			<td>
				<?php if (isset($subCategorys)): ?>
					<ul>
						<?php $i = 1; ?>
						<?php foreach ($subCategorys[$category->getId()] as $key => $value): ?>
							<?php $i++; ?>
							<?php if ($i >= count($subCategorys[$category->getId()])/5): ?>
								</ul></td>
								<?php $i = 0; ?>
								<td><ul>
							<?php endif ?>
							
							<li>- <a href="<?php echo url_for('@catalog?category_name='.$value->getName()) ?>"><?php echo $value->getHeader() ?></a></li>
						<?php endforeach ?>
					</ul>
				<?php endif ?>
			</td>
		</tr>
	</table>
</div>

<div class="clear"><img src="images/spacer.gif" alt="" height="1" /></div>

<?php //</div> ?>

<div class="main_wrapp_block">
	<table>
		<tr>
			<?php $i = 0; ?>
			<?php foreach ($elements as $element): ?>
				<?php $i++; ?>
				
				<?php if ($i >= 3): ?>
					</tr><tr>
					<?php $i = 0; ?>
				<?php endif ?>
				
				<td style="width:40%;">
					<span class="stuff_name"><a href="<?php echo url_for('@element?category_name='.$element->getCategory()->getName().'&element_id='.$element->getId()) ?>"><?php echo $element->getName() ?></a></span>
					<div class="stuff_img">
						<span><a href="#"><img src="/uploads/150x150/<?php echo $element->getPhoto() ?>" alt="<?php echo $element->getName() ?>" /></a></span>
						<span class="stuff_articul">Артикул: ЛК - <?php echo $element->getId() ?></span>
						<span><input type="button" value="Купить" name="stuff_buy" class="buy_button" /></span>
					</div>
					<div class="stuff_review">
						<?php foreach ($element->getPreferences() as $preference): ?>
							<?php echo $preference->getCategoryPreference()->getKey() ?>:.....................<span class="dark"><?php echo $preference->getValue() ?> <?php echo $preference->getCategoryPreference()->getPreferenceUnit() ?></span> <br />
						<?php endforeach ?>
						<br />
						<span class="dark">Цена:.....................<?php echo $element->getCompanyPrice() ?> руб. </span>
					</div>
				</td>
				
			<?php endforeach ?>
		</tr>
</table>
<div class="next_back_links">
	<?php if ($pager->haveToPaginate()): ?>
		<?php echo link_to('Предыдущая', '@catalog?category_name='.$sf_params->get('category_name').'&page='.$pager->getPreviousPage()) ?>
		&lt;&lt;
		<?php $links = $pager->getLinks(); foreach ($links as $page): ?>
			<?php echo ($page == $pager->getPage()) ? $page : link_to($page, '@catalog?category_name='.$sf_params->get('category_name').'&page='.$page) ?>
			<?php if ($page != $pager->getCurrentMaxLink()): ?> :: <?php endif ?>
		<?php endforeach ?>
		&gt;&gt;
		<?php echo link_to('Следующая', '@catalog?category_name='.$sf_params->get('category_name').'&page='.$pager->getNextPage()) ?>
	<?php endif ?>
</div>

</div>
<div class="clear"><img src="images/spacer.gif" alt="" height="1" /></div>
</div>