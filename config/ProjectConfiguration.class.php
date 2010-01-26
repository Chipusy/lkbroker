<?php

require_once '/symfony/1.4/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropelPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfGuardPlugin');
  }
}

mb_internal_encoding("utf8");

// директория загрузки файлов
sfConfig::set('upload_dir', '/www/lk-broker/web/uploads');

// максимальная ширина изображений для простых страниц
sfConfig::set('image_width', 800);

// размеры изображений при ресайзе
sfConfig::set('images_format', array(
		'150x150',
		'500'
	));

// типы динамическийх св-в
sfConfig::set('preference_type', array(
		1 => 'число',
		2 => 'текст',
		3 => 'да/нет',
	));
	
// валюта
sfConfig::set('price_type', array(
		1 => 'руб.',
		2 => 'евро',
		3 => 'доллары США',
	));
	
// типы загружаеммых файлов
sfConfig::set('file_type', array(
		1 => 'image',
		2 => 'doc'
	));