<?php

require_once '/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropelPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
  }
}

mb_internal_encoding("utf8");

// директория загрузки файлов
sfConfig::set('upload_dir', '/www/lk-broker/web/uploads');

// максимальная ширина изображений для простых страниц
sfConfig::set('image_width', 800);
