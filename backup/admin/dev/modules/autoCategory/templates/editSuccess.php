<?php use_helper('I18N', 'Date') ?>
<?php include_partial('category/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Редактированние категории %%header%%', array('%%header%%' => $Category->getHeader()), 'messages') ?></h1>

  <?php include_partial('category/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('category/form_header', array('Category' => $Category, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('category/form', array('Category' => $Category, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('category/form_footer', array('Category' => $Category, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
