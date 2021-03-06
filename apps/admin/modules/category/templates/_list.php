<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('Ничего нет', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0" width="70%">
      <thead>
        <tr>
          <?php include_partial('category/list_th_stacked', array('sort' => $sort)) ?>
          <th width="100" id="sf_admin_list_th_actions"><?php echo __('Действия', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="2">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('category/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <?php echo format_number_choice('[0] ничего нет|[1] 1 всего|(1,+Inf] %1% всего', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
            <?php if ($pager->haveToPaginate()): ?>
              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
            <?php endif; ?>
          </th>
        </tr>
      </tfoot>
      <tbody>
		<?php $categorys = CategoryPeer::getAllSub(); ?>
        <?php foreach ($pager->getResults() as $i => $Category): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('category/list_td_stacked', array('Category' => $Category)) ?>
			<?php include_partial('category/list_td_actions', array('Category' => $Category, 'helper' => $helper)) ?>
			
			<?php if (isset($categorys[$Category->getId()])): ?>
				<?php foreach ($categorys[$Category->getId()] as $key => $value): ?>
					</tr>
					<tr class="sf_admin_row <?php echo $odd ?> sub">
						<?php include_partial('category/list_td_stacked', array('Category' => $categorys[$Category->getId()][$key])) ?>
						<?php include_partial('category/list_td_actions', array('Category' => $categorys[$Category->getId()][$key], 'helper' => $helper)) ?>
				<?php endforeach ?>
			<?php endif ?>
			
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
