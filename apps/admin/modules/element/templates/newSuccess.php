<?php use_helper('I18N', 'Date') ?>
<?php include_partial('element/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Добавление нового элемента', array(), 'messages') ?></h1>

  <?php include_partial('element/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('element/form_header', array('Element' => $Element, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('element/form', array('Element' => $Element, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('element/form_footer', array('Element' => $Element, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
