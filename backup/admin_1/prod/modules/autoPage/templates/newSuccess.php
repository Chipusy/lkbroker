<?php use_helper('I18N', 'Date') ?>
<?php include_partial('page/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Добавление новой страницы', array(), 'messages') ?></h1>

  <?php include_partial('page/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('page/form_header', array('Page' => $Page, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('page/form', array('Page' => $Page, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('page/form_footer', array('Page' => $Page, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
