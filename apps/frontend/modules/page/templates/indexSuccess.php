<div class="name_page"><h1>РАСПРОДАЖА ИЗЪЯТОГО ИМУЩЕСТВА</h1></div>
<div class="categories">
	<table>
		<tr>
			<td style="width:30%;">
			<?php $i = 0; ?>
			
			<?php foreach ($parentCategory as $parent): ?>
				
				<?php if ($i >= 29): ?>
					</td>
					<?php $i = 0; ?>
					<td style="width:30%;">
				<?php endif ?>
				
				<?php $i++; ?>
					<div class="podzagolovok"><a href="<?php echo url_for('@catalog?category_name='.strtolower($parent->getName())); ?>"><?php echo $parent->getHeader() ?></a></div>
					<?php if (isset($subCategory[$parent->getId()])): ?>
						<ul>
							<?php foreach ($subCategory[$parent->getId()] as $id => $sub): ?>
								<?php $i++; ?>
								<li>- <a href="<?php echo url_for('@catalog?category_name='.$sub->getName()); ?>"><?php echo $sub->getHeader() ?></a></li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
			<?php endforeach ?>
			
			</td>
		</tr>
	</table>
</div>
<div class="clear"><img src="/images/spacer.gif" alt="" height="1" /></div>
